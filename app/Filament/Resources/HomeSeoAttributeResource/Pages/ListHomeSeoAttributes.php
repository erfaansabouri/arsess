<?php

namespace App\Filament\Resources\HomeSeoAttributeResource\Pages;

use App\Filament\Resources\HomeSeoAttributeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomeSeoAttributes extends ListRecords
{
    protected static string $resource = HomeSeoAttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
