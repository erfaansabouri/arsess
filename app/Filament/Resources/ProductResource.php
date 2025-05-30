<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ProductResource extends Resource {
    protected static ?string $model          = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form ( Form $form ): Form {
        return $form->schema([
                                 // brand relation
                                 Forms\Components\Select::make('brand_id')
                                                        ->relationship('brand' , 'title')
                                                        ->required()
                                                        ->searchable()
                                                        ->preload()
                                                        ->columnSpanFull()
                                                        ->label('برند') ,
                                 Forms\Components\TextInput::make('title')
                                                           ->maxLength(255)
                                                           ->default(null)
                                                           ->label('عنوان') ,
                                 // stock
                                 Forms\Components\TextInput::make('stock')
                                                           ->numeric()
                                                           ->label('موجودی انبار') ,
                                 Forms\Components\TextInput::make('slug')
                                                           ->maxLength(255)
                                                           ->default(null)
                                                           ->label('اسلاگ') ,
                                 Forms\Components\Textarea::make('summary')
                                                          ->columnSpanFull()
                                                          ->label('خلاصه') ,
                                 Forms\Components\TextInput::make('price')
                                                           ->maxLength(255)
                                                           ->numeric()
                                                           ->label('قیمت') ,
                                 TinyEditor::make('description')
                                           ->columnSpanFull()
                                           ->label('توضیحات') ,
                                 Forms\Components\Toggle::make('is_selected')
                                                        ->required()
                                                        ->label('گنجینه') ,
                                 Select::make('categories')
                                       ->multiple()
                                       ->preload()
                                       ->relationship(titleAttribute: 'title') ,
                                 // image
                                 Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                                                                              ->collection('image')
                                                                              ->label('تصویر') ,
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
                                   // brand
                                   Tables\Columns\TextColumn::make('brand.title')
                                                            ->searchable()
                                                            ->label('برند') ,
                                   Tables\Columns\TextColumn::make('title')
                                                            ->searchable()
                                                            ->label('عنوان') ,
                                   Tables\Columns\TextColumn::make('slug')
                                                            ->searchable()
                                                            ->label('اسلاگ') ,
                                   Tables\Columns\TextColumn::make('price')
                                                            ->searchable()
                                                            ->label('قیمت') ,
                                   Tables\Columns\IconColumn::make('is_selected')
                                                            ->boolean()
                                                            ->label('گنجینه') ,
                                   // categories
                               ])
                     ->filters([])
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
        return [
            RelationManagers\ProductAttributesRelationManager::class ,
            RelationManagers\ProductPurchaseConditionsRelationManager::class ,
        ];
    }

    public static function getPages (): array {
        return [
            'index' => Pages\ListProducts::route('/') ,
            'create' => Pages\CreateProduct::route('/create') ,
            'edit' => Pages\EditProduct::route('/{record}/edit') ,
        ];
    }

    public static function getModelLabel (): string {
        return 'محصول';
    }

    // نام جمع مدل - مثلاً در لیست پست‌ها
    public static function getPluralModelLabel (): string {
        return 'محصول ها';
    }

    // عنوانی که در منوی سمت چپ Filament نمایش داده میشه
    public static function getNavigationLabel (): string {
        return 'محصول ها';
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
