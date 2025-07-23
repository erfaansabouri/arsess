<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Services\SmsService;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Actions;

class ViewInvoicePro extends ViewRecord {
    protected static string $resource = InvoiceResource::class;

    public function infolist ( Infolist $infolist ): Infolist {
        return $infolist->schema([
                                     Section::make('اطلاعات پرداخت')
                                            ->schema([
                                                         Actions::make([
                                                                           Action::make('star')
                                                                                 ->label('تغییر وضعیت به در حال انجام')
                                                                                 ->icon('heroicon-m-arrow-path')
                                                                                 ->requiresConfirmation()
                                                                                 ->hidden(fn ( Invoice $record ): bool => $record->status != Invoice::STATUSES[ 'init' ])
                                                                                 ->action(function () {
                                                                                     $this->record->update([ 'status' => Invoice::STATUSES[ 'process' ] ]);
                                                                                     SmsService::send($this->record->user->phone,'334440', [
                                                                                         $this->record->code,
                                                                                     ]);
                                                                                 }) ,
                                                                           Action::make('star')
                                                                                 ->label('تغییر وضعیت به ارسال شده')
                                                                                 ->icon('heroicon-m-arrow-path')
                                                                                 ->requiresConfirmation()
                                                                                 ->hidden(fn ( Invoice $record ): bool => $record->status != Invoice::STATUSES[ 'process' ])
                                                                                 ->action(function () {
                                                                                     $this->record->update([ 'status' => Invoice::STATUSES[ 'sent' ] ]);
                                                                                     SmsService::send($this->record->user->phone,'334443', [
                                                                                         'token1' => $this->record->code,
                                                                                     ]);
                                                                                 }) ,
                                                                       ]) ,
                                                         TextEntry::make('status')
                                                                  ->label('وضعیت')
                                                                  ->formatStateUsing(fn ( string $state ): string => match ( $state ) {
                                                                      Invoice::STATUSES[ 'init' ] => 'اولیه' ,
                                                                      Invoice::STATUSES[ 'process' ] => 'در حال انجام' ,
                                                                      Invoice::STATUSES[ 'sent' ] => 'ارسال شده' ,
                                                                      default => $state ,
                                                                  }) ,
                                                         TextEntry::make('code')
                                                                  ->label('کد') ,
                                                         TextEntry::make('tx_id')
                                                                  ->label('کد درگاه') ,
                                                         TextEntry::make('payment_price')
                                                                  ->numeric()
                                                                  ->label('مبلغ پرداختی') ,
                                                         TextEntry::make('products_price')
                                                                  ->numeric()
                                                                  ->label('مبلغ محصولات') ,
                                                         TextEntry::make('discount')
                                                                  ->numeric()
                                                                  ->label('تخفیف') ,
                                                         TextEntry::make('coupon_code')
                                                                  ->label('کد تخفیف') ,
                                                         TextEntry::make('paid_at')
                                                                  ->label('تاریخ پرداخت')
                                                                  ->jalaliDateTime() ,
                                                     ])
                                            ->columns(2) ,
                                     Section::make('مشخصات مشتری')
                                            ->schema([
                                                         TextEntry::make('first_name')
                                                                  ->label('نام') ,
                                                         TextEntry::make('last_name')
                                                                  ->label('نام خانوادگی') ,
                                                         TextEntry::make('phone')
                                                                  ->label('شماره تماس') ,
                                                         TextEntry::make('email')
                                                                  ->label('ایمیل') ,
                                                         TextEntry::make('postal_code')
                                                                  ->label('کد پستی') ,
                                                         TextEntry::make('address')
                                                                  ->label('آدرس') ,
                                                     ])
                                            ->columns(2) ,
                                     Section::make('توضیحات')
                                            ->schema([
                                                         TextEntry::make('description')
                                                                  ->label('توضیحات سفارش') ,
                                                     ]) ,
                                 ]);
    }
}
