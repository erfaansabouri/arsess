<?php

namespace App\Filament\Resources\InvoiceResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;

class InvoiceItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'invoiceItems';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $label = 'محصولات خریداری شده';
    protected static ?string $pluralLabel = 'محصولات خریداری شده';

    public static function canViewForRecord( $ownerRecord , string $pageClass ): bool
    {
        return true;
    }

    public static function canViewAny(): bool
    {
        return true;
    }

    public function canCreate(): bool
    {
        return false;
    }

    public function canEdit($record): bool
    {
        return false;
    }

    public function canDelete($record): bool
    {
        return false;
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                          Tables\Columns\TextColumn::make('product_id')->label('شناسه محصول'),
                          Tables\Columns\TextColumn::make('quantity')->label('تعداد'),
                          Tables\Columns\TextColumn::make('price')->label('قیمت'),
                      ])
            ->actions([]) // بدون اکشن
            ->bulkActions([]); // بدون bulk
    }
}
