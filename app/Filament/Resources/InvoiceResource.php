<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Filament\Resources\InvoiceResource\RelationManagers\InvoiceItemsRelationManager;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource {
    protected static ?string $model          = Invoice::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form ( Form $form ): Form {
        return $form->schema([
                                 Select::make('status')
                                       ->options([
                                                     Invoice::STATUSES[ 'init' ] => 'اولیه' ,
                                                     Invoice::STATUSES[ 'process' ] => 'در حال انجام' ,
                                                     Invoice::STATUSES[ 'sent' ] => 'ارسال شده' ,
                                                 ])
                                       ->afterStateUpdated(function ( ?string $state , ?string $old ) {
                                           dd($state , $old);
                                       }) ,
                                 Forms\Components\TextInput::make('code')
                                                           ->label('شناسه')
                                                           ->disabled() ,
                                 Forms\Components\TextInput::make('tx_id')
                                                           ->label('شناسه درگاهی')
                                                           ->disabled() ,
                                 Forms\Components\TextInput::make('products_price')
                                                           ->label('مبلغ محصولات')
                                                           ->disabled() ,
                                 Forms\Components\TextInput::make('discount')
                                                           ->label('تخفیف')
                                                           ->disabled() ,
                                 Forms\Components\TextInput::make('coupon_code')
                                                           ->label('کد تخفیف')
                                                           ->disabled() ,
                                 Forms\Components\TextInput::make('payment_price')
                                                           ->label('مبلغ پرداختی')
                                                           ->disabled() ,
                                 Forms\Components\TextInput::make('first_name')
                                                           ->label('نام')
                                                           ->disabled() ,
                                 Forms\Components\TextInput::make('last_name')
                                                           ->label('نام خانوادگی')
                                                           ->disabled() ,
                                 Forms\Components\Textarea::make('address')
                                                          ->label('آدرس')
                                                          ->disabled() ,
                                 Forms\Components\TextInput::make('postal_code')
                                                           ->label('کد پستی')
                                                           ->disabled() ,
                                 Forms\Components\TextInput::make('phone')
                                                           ->label('شماره تماس')
                                                           ->disabled() ,
                                 Forms\Components\TextInput::make('email')
                                                           ->label('ایمیل')
                                                           ->disabled() ,
                                 Forms\Components\Textarea::make('description')
                                                          ->label('توضیحات')
                                                          ->disabled() ,
                                 DateTimePicker::make('paid_at')
                                               ->label('تاریخ پرداخت')
                                               ->jalali(weekdaysShort: true)
                                               ->disabled() ,
                             ]);
    }

    public static function table ( Table $table ): Table {
        return $table->columns([
                                   Tables\Columns\TextColumn::make('code')
                                                            ->label('کد')
                                                            ->numeric() ,
                                   Tables\Columns\TextColumn::make('first_name')
                                                            ->label('نام') ,
                                   Tables\Columns\TextColumn::make('last_name')
                                                            ->label('نام خانوادگی') ,
                                   Tables\Columns\TextColumn::make('status')
                                                            ->label('وضعیت')
                                                            ->formatStateUsing(fn ( string $state ): string => match ( $state ) {
                                                                Invoice::STATUSES[ 'init' ] => 'اولیه' ,
                                                                Invoice::STATUSES[ 'process' ] => 'در حال انجام' ,
                                                                Invoice::STATUSES[ 'sent' ] => 'ارسال شده' ,
                                                                default => $state ,
                                                            }) ,
                                   Tables\Columns\TextColumn::make('payment_price')
                                                            ->label('مبلغ پرداختی')
                                                            ->numeric() ,
                                   Tables\Columns\TextColumn::make('phone')
                                                            ->label('شماره تماس') ,
                                   IconColumn::make('is_paid')
                                             ->boolean()
                                             ->label('وضعیت پرداخت')
                                             ->trueIcon('heroicon-o-check-badge')
                                             ->falseIcon('heroicon-o-x-mark') ,
                               ])
                     ->actions([
                                   Tables\Actions\ViewAction::make()
                                                            ->url(fn ( $record ) => Pages\ViewInvoicePro::getUrl([ 'record' => $record ])) ,
                               ])
                     ->bulkActions([])
                     ->defaultSort('id' , 'desc');
    }

    public static function getRelations (): array {
        return [
            InvoiceItemsRelationManager::class ,
        ];
    }

    public static function getPages (): array {
        return [
            'index' => Pages\ListInvoices::route('/') ,
            'view' => Pages\ViewInvoice::route('/{record}') ,
            'view-pro' => Pages\ViewInvoicePro::route('/{record}/view-pro') ,
        ];
    }

    public static function getModelLabel (): string {
        return 'سفارش';
    }

    // نام جمع مدل - مثلاً در لیست پست‌ها
    public static function getPluralModelLabel (): string {
        return 'سفارش ها';
    }

    // عنوانی که در منوی سمت چپ Filament نمایش داده میشه
    public static function getNavigationLabel (): string {
        return 'سفارش ها';
    }

    // (اختیاری) گروه‌بندی منابع در منو
    public static function getNavigationGroup (): ?string {
        return 'مالی';
    }

    // آیکون نمایش داده‌شده در منو
    public static function getNavigationIcon (): string {
        return 'heroicon-o-pencil-square';
    }
}
