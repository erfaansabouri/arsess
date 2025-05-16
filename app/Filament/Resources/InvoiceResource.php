<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
                                 Forms\Components\TextInput::make('tx_id')->label('کد تراکنش')->disabled(),
                                 Forms\Components\TextInput::make('products_price')->label('مبلغ محصولات')->disabled(),
                                 Forms\Components\TextInput::make('shipping_price')->label('هزینه ارسال')->disabled(),
                                 Forms\Components\TextInput::make('discount')->label('تخفیف')->disabled(),
                                 Forms\Components\TextInput::make('coupon_code')->label('کد تخفیف')->disabled(),
                                 Forms\Components\TextInput::make('payment_price')->label('مبلغ پرداختی')->disabled(),
                                 Forms\Components\TextInput::make('first_name')->label('نام')->disabled(),
                                 Forms\Components\TextInput::make('last_name')->label('نام خانوادگی')->disabled(),
                                 Forms\Components\Textarea::make('address')->label('آدرس')->disabled(),
                                 Forms\Components\TextInput::make('postal_code')->label('کد پستی')->disabled(),
                                 Forms\Components\TextInput::make('phone')->label('شماره تماس')->disabled(),
                                 Forms\Components\TextInput::make('email')->label('ایمیل')->disabled(),
                                 Forms\Components\Textarea::make('description')->label('توضیحات')->disabled(),
                                 Forms\Components\DateTimePicker::make('paid_at')->label('زمان پرداخت')->disabled(),
                                 Forms\Components\DateTimePicker::make('failed_at')->label('زمان ناموفق')->disabled(),
                             ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                                   Tables\Columns\TextColumn::make('id')->label('شناسه'),
                                   Tables\Columns\TextColumn::make('tx_id')->label('کد تراکنش'),
                                   Tables\Columns\TextColumn::make('payment_price')->label('مبلغ پرداختی'),
                                   Tables\Columns\TextColumn::make('phone')->label('شماره تماس'),
                                   Tables\Columns\TextColumn::make('paid_at')->label('زمان پرداخت')->dateTime(),
                               ])
                     ->actions([
                                   Tables\Actions\ViewAction::make()->label('مشاهده'),
                               ])
                     ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\InvoiceResource\RelationManagers\InvoiceItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
