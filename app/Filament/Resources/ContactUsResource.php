<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactUsResource\Pages;
use App\Filament\Resources\ContactUsResource\RelationManagers;
use App\Models\ContactUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactUsResource extends Resource {
    protected static ?string $model = ContactUs::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form ( Form $form ): Form {
        return $form->schema([
                                 Forms\Components\TextInput::make('phone_1')
                                                           ->maxLength(255)
                                                           ->label('شماره یک') ,
                                 Forms\Components\TextInput::make('phone_2')
                                                           ->maxLength(255)
                                                           ->label('شماره دو') ,
                                 Forms\Components\Textarea::make('address')
                                                          ->columnSpanFull()
                                                          ->label('آدرس') ,
                                 Forms\Components\Textarea::make('openstreet_url')
                                                          ->columnSpanFull()
                                                          ->label('لینک اپن استریت') ,
                             ]);
    }

    public static function table ( Table $table ): Table {
        return $table->columns([
                                   Tables\Columns\TextColumn::make('phone_1')
                                                            ->searchable()
                                                            ->label('شماره یک') ,
                                   Tables\Columns\TextColumn::make('phone_2')
                                                            ->searchable()
                                                            ->label('شماره دو') ,
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
            'index' => Pages\ListContactUs::route('/') ,
            'create' => Pages\CreateContactUs::route('/create') ,
            'edit' => Pages\EditContactUs::route('/{record}/edit') ,
        ];
    }

    public static function getModelLabel (): string {
        return 'صفحه ارتباط با ما';
    }

    // نام جمع مدل - مثلاً در لیست پست‌ها
    public static function getPluralModelLabel (): string {
        return 'صفحه ارتباط با ما';
    }

    // عنوانی که در منوی سمت چپ Filament نمایش داده میشه
    public static function getNavigationLabel (): string {
        return 'صفحه ارتباط با ما';
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
