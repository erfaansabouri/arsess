<?php

namespace App\Filament\Resources\BlogPostHashtagResource\Pages;

use App\Filament\Resources\BlogPostHashtagResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogPostHashtags extends ListRecords
{
    protected static string $resource = BlogPostHashtagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
