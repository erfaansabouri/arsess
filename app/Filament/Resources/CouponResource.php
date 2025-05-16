<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Filament\Resources\CouponResource\RelationManagers;
use App\Models\Coupon;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CouponResource extends Resource {
    protected static ?string $model          = Coupon::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form ( Form $form ): Form {
        return $form->schema([
                                 Forms\Components\TextInput::make('code')
                                                           ->required()
                                                           ->label('کد')
                                                           ->maxLength(255) ,
                                 Forms\Components\TextInput::make('discount_percent')
                                                           ->required()
                                                           ->numeric()
                                                           ->label('درصد تخفیف')
                                                           ->minValue(1)
                                                           ->maxValue(99) ,
                                 DateTimePicker::make('created_at')
                                               ->label('تاریخ')
                                               ->jalali(weekdaysShort: true) ,
                             ]);
    }

    public static function table ( Table $table ): Table {
        return $table->columns([
                                   Tables\Columns\TextColumn::make('code')
                                                            ->label('کد')
                                                            ->searchable() ,
                                   Tables\Columns\TextColumn::make('discount_percent')
                                                            ->numeric()
                                                            ->label('درصد تخفیف')
                                                            ->sortable() ,
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
            'index' => Pages\ListCoupons::route('/') ,
            'create' => Pages\CreateCoupon::route('/create') ,
            'edit' => Pages\EditCoupon::route('/{record}/edit') ,
        ];
    }
}
