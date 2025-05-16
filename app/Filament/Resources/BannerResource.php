<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource {
    protected static ?string $model = Banner::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form ( Form $form ): Form {
        return $form->schema([
                                 Forms\Components\TextInput::make('title')
                                                           ->maxLength(255)
                                                           ->default(null) ,
                                 Forms\Components\TextInput::make('url')
                                                           ->maxLength(255)
                                                           ->default(null) ,
                                 SpatieMediaLibraryFileUpload::make('image')
                                                             ->collection('image')
                                                             ->label('تصویر')
                                                             ->required()
                                                             ->rules([ 'image' ]) ,
                                 SpatieMediaLibraryFileUpload::make('brand')
                                                             ->collection('brand')
                                                             ->label('برند')
                                                             ->required()
                                                             ->rules([ 'image' ]) ,
                             ]);
    }

    public static function table ( Table $table ): Table {
        return $table->columns([
                                   Tables\Columns\TextColumn::make('title')
                                                            ->searchable() ,
                                   Tables\Columns\TextColumn::make('url')
                                                            ->searchable() ,
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
            'index' => Pages\ListBanners::route('/') ,
            'create' => Pages\CreateBanner::route('/create') ,
            'edit' => Pages\EditBanner::route('/{record}/edit') ,
        ];
    }

    public static function getModelLabel (): string {
        return 'بنر';
    }

    // نام جمع مدل - مثلاً در لیست پست‌ها
    public static function getPluralModelLabel (): string {
        return 'بنر ها';
    }

    // عنوانی که در منوی سمت چپ Filament نمایش داده میشه
    public static function getNavigationLabel (): string {
        return 'بنر ها';
    }

    // (اختیاری) گروه‌بندی منابع در منو
    public static function getNavigationGroup (): ?string {
        return 'مدیریت محتوا';
    }

    // آیکون نمایش داده‌شده در منو
    public static function getNavigationIcon (): string {
        return 'heroicon-o-pencil-square';
    }
}
