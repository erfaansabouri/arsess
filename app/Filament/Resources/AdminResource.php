<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                         Forms\Components\Fieldset::make('Personal Information')
                                                  ->schema([
                                                               Forms\Components\TextInput::make('name')
                                                                                         ->label('نام')
                                                                                         ->maxLength(255)
                                                                                         ->default(null)
                                                                                         ->translateLabel(),
                                                               Forms\Components\TextInput::make('phone')
                                                                                         ->label('شماره تلفن')
                                                                                         ->maxLength(255)
                                                                                         ->default(null)
                                                                                         ->translateLabel(),
                                                           ])
                                                  ->columns(1),
                     ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                          Tables\Columns\TextColumn::make('name')
                                                   ->label('نام')
                                                   ->searchable()
                                                   ->translateLabel(),
                          Tables\Columns\TextColumn::make('phone')
                                                   ->label('شماره تلفن')
                                                   ->searchable()
                                                   ->translateLabel(),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'مدیر';
    }

    public static function getPluralModelLabel(): string
    {
        return 'مدیرها';
    }

    public static function getNavigationLabel(): string
    {
        return 'مدیران';
    }

    public static function getNavigationGroup(): string
    {
        return 'مدیریت';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-user-group';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }
}
