<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostCategoryResource\Pages;
use App\Filament\Resources\BlogPostCategoryResource\RelationManagers;
use App\Models\BlogPostCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogPostCategoryResource extends Resource {
    protected static ?string $model = BlogPostCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form ( Form $form ): Form {
        return $form->schema([
                                 TextInput::make('title')
                                          ->label('عنوان')
                                          ->required()
                                          ->maxLength(255) ,
                                 TextInput::make('slug')
                                          ->label('Slug')
                                          ->required()
                                          ->maxLength(255) ,
                             ]);
    }

    public static function table ( Table $table ): Table {
        return $table->columns([
                                   Tables\Columns\TextColumn::make('title')
                                                            ->label('عنوان')
                                                            ->searchable()
                                                            ->sortable(),
                               ])
                     ->filters([//
                               ])
                     ->actions([
                                   Tables\Actions\EditAction::make() ,
                               ])
                     ->bulkActions([
                                       Tables\Actions\BulkActionGroup::make([
                                                                                Tables\Actions\DeleteBulkAction::make() ,
                                                                            ]) ,
                                   ]);
    }

    public static function getRelations (): array {
        return [//
        ];
    }

    public static function getPages (): array {
        return [
            'index' => Pages\ListBlogPostCategories::route('/') ,
            'create' => Pages\CreateBlogPostCategory::route('/create') ,
            'edit' => Pages\EditBlogPostCategory::route('/{record}/edit') ,
        ];
    }

    public static function getModelLabel (): string {
        return 'دسته بندی بلاگ';
    }

    // نام جمع مدل - مثلاً در لیست پست‌ها
    public static function getPluralModelLabel (): string {
        return 'دسته بندی بلاگ';
    }

    // عنوانی که در منوی سمت چپ Filament نمایش داده میشه
    public static function getNavigationLabel (): string {
        return 'دسته بندی بلاگ';
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
