<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductCategoryResource\Pages;
use App\Filament\Resources\ProductCategoryResource\RelationManagers;
use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductCategoryResource extends Resource {
    protected static ?string $model = ProductCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form ( Form $form ): Form {
        return $form->schema([
                                 Forms\Components\TextInput::make('title')
                                                           ->maxLength(255)
                                                           ->label('عنوان') ,
                                 Forms\Components\TextInput::make('slug')
                                                           ->maxLength(255)
                                                           ->label('اسلاگ') ,
                                 // parent_id relationship
                                 Forms\Components\Select::make('parent_id')
                                                        ->relationship('parent' , 'title')
                                                        ->searchable()
                                                        ->preload()
                                                        ->label('سر دسته') ,
                             ]);
    }

    public static function table ( Table $table ): Table {
        return $table->columns([
                                   Tables\Columns\TextColumn::make('title')
                                                            ->searchable()
                                                            ->sortable()
                                                            ->label('عنوان') ,
                               ])
                     ->filters([//
                               ])
                     ->actions([
                                   Tables\Actions\EditAction::make() ,
                               ])
                     ->bulkActions([]);
    }

    public static function getRelations (): array {
        return [//
        ];
    }

    public static function getPages (): array {
        return [
            'index' => Pages\ListProductCategories::route('/') ,
            'create' => Pages\CreateProductCategory::route('/create') ,
            'edit' => Pages\EditProductCategory::route('/{record}/edit') ,
        ];
    }

    public static function getModelLabel (): string {
        return 'دسته بندی محصولات';
    }

    // نام جمع مدل - مثلاً در لیست پست‌ها
    public static function getPluralModelLabel (): string {
        return 'دسته بندی محصولات';
    }

    // عنوانی که در منوی سمت چپ Filament نمایش داده میشه
    public static function getNavigationLabel (): string {
        return 'دسته بندی محصولات';
    }

    // (اختیاری) گروه‌بندی منابع در منو
    public static function getNavigationGroup (): ?string {
        return 'محصول ها';
    }

    // آیکون نمایش داده‌شده در منو
    public static function getNavigationIcon (): string {
        return 'heroicon-o-pencil-square';
    }
}
