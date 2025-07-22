<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeSeoAttributeResource\Pages;
use App\Filament\Resources\HomeSeoAttributeResource\RelationManagers;
use App\Models\HomeSeoAttribute;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeSeoAttributeResource extends Resource
{
    protected static ?string $model = HomeSeoAttribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                         Forms\Components\Fieldset::make('اطلاعات سئو صفحه اصلی')
                                                  ->schema([
                                                               Forms\Components\TextInput::make('title')
                                                                                         ->required()
                                                                                         ->translateLabel()
                                                                                         ->label('عنوان')
                                                                                         ->placeholder('عنوان سئو را وارد کنید'),
                                                               Forms\Components\TextInput::make('meta_description')
                                                                                         ->required()
                                                                                         ->translateLabel()
                                                                                         ->label('توضیحات متا')
                                                                                         ->placeholder('توضیحات متا را وارد کنید'),
                                                               Forms\Components\TextInput::make('keywords')
                                                                                         ->required()
                                                                                         ->translateLabel()
                                                                                         ->label('کلمات کلیدی')
                                                                                         ->placeholder('کلمات کلیدی سئو را وارد کنید'),
                                                               SpatieMediaLibraryFileUpload::make('image')
                                                                                           ->collection('image')
                                                                                           ->label('تصویر')
                                                                                           ->required()
                                                                                           ->rules([ 'image' ]) ,
                                                           ]),
                     ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                          Tables\Columns\TextColumn::make('title')
                                                   ->translateLabel()
                                                   ->label('عنوان')
                                                   ->searchable(),
                          Tables\Columns\TextColumn::make('meta_description')
                                                   ->translateLabel()
                                                   ->label('توضیحات متا')
                                                   ->limit(50),
                          Tables\Columns\TextColumn::make('keywords')
                                                   ->translateLabel()
                                                   ->label('کلمات کلیدی')
                                                   ->limit(50),

                      ])
            ->filters([
                          //
                      ])
            ->actions([
                          Tables\Actions\EditAction::make(),
                      ])
            ->bulkActions([
                              Tables\Actions\BulkActionGroup::make([
                                                                   ]),
                          ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomeSeoAttributes::route('/'),
            'create' => Pages\CreateHomeSeoAttribute::route('/create'),
            'edit' => Pages\EditHomeSeoAttribute::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'ویژگی سئو صفحه اصلی';
    }

    public static function getPluralModelLabel(): string
    {
        return 'ویژگی‌های سئو صفحه اصلی';
    }

    public static function getNavigationLabel(): string
    {
        return 'ویژگی‌های سئو صفحه اصلی';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'مدیریت سئو';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-rectangle-stack';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }
}
