<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class BlogPostResource extends Resource {
    protected static ?string $model          = BlogPost::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form ( Form $form ): Form {
        return $form->schema([
                                 TextInput::make('title')
                                          ->label('عنوان')
                                          ->required()
                                          ->maxLength(255) ,
                                 TextInput::make('slug')
                                          ->label('اسلاگ')
                                          ->required()
                                          ->unique(ignoreRecord: true)
                                          ->helperText('فقط حروف کوچک، اعداد و خط تیره مجاز است') ,
                                 SpatieMediaLibraryFileUpload::make('image')
                                                             ->collection('image')
                                                             ->label('تصویر')
                                                             ->required()
                                                             ->rules([ 'image' ]) ,
                                 TinyEditor::make('body')
                                                            ->label('متن')
                                                            ->required()
                                                            ->columnSpanFull() ,
                                 Select::make('categories')
                                       ->label('دسته‌بندی‌ها')
                                       ->preload()
                                       ->multiple()
                                       ->relationship('categories' , 'title') ,
                                 Select::make('hashtags')
                                       ->label('هشتگ‌ها')
                                       ->preload()
                                       ->multiple()
                                       ->relationship('hashtags' , 'title') ,
                                 DateTimePicker::make('created_at')
                                               ->label('تاریخ')
                                               ->jalali(weekdaysShort: true) ,
                                 //meta_title
                                 Forms\Components\TextInput::make('meta_title')
                                                           ->maxLength(255)
                                                           ->default(null)
                                                           ->label('عنوان متا') ,
                                 // meta_description
                                 Forms\Components\Textarea::make('meta_description')
                                                          ->columnSpanFull()
                                                          ->label('توضیحات متا') ,
                                 // meta_keywords
                                 Forms\Components\TextInput::make('meta_keywords')
                                                           ->maxLength(255)
                                                           ->default(null)
                                                           ->label('کلمات کلیدی متا') ,
                                 // canonical_url
                                 Forms\Components\TextInput::make('canonical_url')
                                                           ->maxLength(255)
                                                           ->default(null)
                                                           ->label('آدرس کاننیکال') ,
                             ]);
    }

    public static function table ( Table $table ): Table {
        return $table->columns([
                                   TextColumn::make('title')
                                             ->label('عنوان')
                                             ->searchable()
                                             ->sortable() ,
                                   TextColumn::make('slug')
                                             ->label('اسلاگ') ,
                                   TextColumn::make('categories.title')
                                             ->label('دسته‌بندی‌ها')
                                             ->limitList(2)
                                             ->bulleted() ,
                                   TextColumn::make('hashtags.title')
                                             ->label('هشتگ‌ها')
                                             ->limitList(2)
                                             ->bulleted() ,
                                   TextColumn::make('created_at')
                                             ->label('تاریخ')
                                             ->jalaliDateTime() ,
                               ]);
    }

    public static function getRelations (): array {
        return [//
        ];
    }

    public static function getPages (): array {
        return [
            'index' => Pages\ListBlogPosts::route('/') ,
            'create' => Pages\CreateBlogPost::route('/create') ,
            'edit' => Pages\EditBlogPost::route('/{record}/edit') ,
        ];
    }

    public static function getModelLabel (): string {
        return 'پست وبلاگ';
    }

    // نام جمع مدل - مثلاً در لیست پست‌ها
    public static function getPluralModelLabel (): string {
        return 'پست‌های وبلاگ';
    }

    // عنوانی که در منوی سمت چپ Filament نمایش داده میشه
    public static function getNavigationLabel (): string {
        return 'پست‌های وبلاگ';
    }

    // (اختیاری) گروه‌بندی منابع در منو
    public static function getNavigationGroup (): ?string {
        return 'بلاگ';
    }

    // آیکون نمایش داده‌شده در منو
    public static function getNavigationIcon (): string {
        return 'heroicon-o-pencil-square';
    }
}
