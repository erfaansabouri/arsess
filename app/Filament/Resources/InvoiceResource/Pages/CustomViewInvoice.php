<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\Section;

class CustomViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    protected static string $pageTitle = 'Invoice Details';

    protected function getFormSchema(): array
    {
        return [
            Section::make()
                ->schema([

                         ]),
        ];
    }
}
