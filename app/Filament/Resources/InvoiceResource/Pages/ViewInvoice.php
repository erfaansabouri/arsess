<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\Section;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    protected static string $pageTitle = 'Invoice Details';

    protected function getFormSchema(): array
    {
        return [
            Section::make()
                ->heading('Invoice Details')
                ->schema([
                             InfoList::make()
                                     ->label('Invoice Information')
                                     ->columns(2)
                                     ->items([
                                                 'IDDD'  => $this->record->id,
                                             ]),
                         ]),
        ];
    }
}
