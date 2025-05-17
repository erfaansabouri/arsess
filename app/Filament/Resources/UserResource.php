<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource {
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form ( Form $form ): Form {
        return $form->schema([
                                 Forms\Components\TextInput::make('phone')
                                                           ->required()
                                                           ->maxLength(255)
                                                           ->label('شماره تلفن') ,
                                 Forms\Components\TextInput::make('otp')
                                                           ->maxLength(255)
                                                           ->label('کد تایید') ,
                                 Forms\Components\TextInput::make('first_name')
                                                           ->maxLength(255)
                                                           ->label('نام') ,
                                 Forms\Components\TextInput::make('last_name')
                                                           ->maxLength(255)
                                                           ->label('نام خانوادگی') ,
                                 Forms\Components\TextInput::make('postal_code')
                                                           ->maxLength(255)
                                                           ->label('کد پستی') ,
                                 Forms\Components\Textarea::make('address')
                                                          ->columnSpanFull()
                                                          ->label('آدرس') ,
                             ]);
    }

    public static function table ( Table $table ): Table {
        return $table->columns([
                                   Tables\Columns\TextColumn::make('phone')
                                                            ->searchable()
                                                            ->label('شماره تلفن') ,
                                   Tables\Columns\TextColumn::make('otp')
                                                            ->searchable()
                                                            ->label('کد تایید') ,
                                   Tables\Columns\TextColumn::make('first_name')
                                                            ->searchable()
                                                            ->label('نام') ,
                                   Tables\Columns\TextColumn::make('last_name')
                                                            ->searchable()
                                                            ->label('نام خانوادگی') ,
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
            'index' => Pages\ListUsers::route('/') ,
            'create' => Pages\CreateUser::route('/create') ,
            'edit' => Pages\EditUser::route('/{record}/edit') ,
        ];
    }

    public static function getModelLabel (): string {
        return 'کاربر';
    }

    // نام جمع مدل - مثلاً در لیست پست‌ها
    public static function getPluralModelLabel (): string {
        return 'کاربران';
    }

    // عنوانی که در منوی سمت چپ Filament نمایش داده میشه
    public static function getNavigationLabel (): string {
        return 'کاربران';
    }

    // (اختیاری) گروه‌بندی منابع در منو
    public static function getNavigationGroup (): ?string {
        return 'کاربران';
    }

    // آیکون نمایش داده‌شده در منو
    public static function getNavigationIcon (): string {
        return 'heroicon-o-pencil-square';
    }
}
