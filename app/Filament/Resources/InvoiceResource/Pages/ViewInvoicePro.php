<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;

class ViewInvoicePro extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                         Section::make('اطلاعات پرداخت')
                                ->schema([

                                             TextEntry::make('tx_id')->label('کد تراکنش'),
                                             TextEntry::make('payment_price')->label('مبلغ پرداختی'),
                                             TextEntry::make('products_price')->label('مبلغ محصولات'),
                                             TextEntry::make('shipping_price')->label('هزینه ارسال'),
                                             TextEntry::make('discount')->label('تخفیف'),
                                             TextEntry::make('coupon_code')->label('کد تخفیف'),
                                         ])->columns(2),

                         Section::make('مشخصات مشتری')
                                ->schema([
                                             TextEntry::make('first_name')->label('نام'),
                                             TextEntry::make('last_name')->label('نام خانوادگی'),
                                             TextEntry::make('phone')->label('شماره تماس'),
                                             TextEntry::make('email')->label('ایمیل'),
                                             TextEntry::make('postal_code')->label('کد پستی'),
                                             TextEntry::make('address')->label('آدرس'),
                                         ])->columns(2),

                         Section::make('توضیحات')
                                ->schema([
                                             TextEntry::make('description')->label('توضیحات سفارش'),
                                         ]),
                     ]);
    }
}
