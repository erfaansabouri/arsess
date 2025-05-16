<?php

namespace App\Filament\Resources\BlogPostHashtagResource\Pages;

use App\Filament\Resources\BlogPostHashtagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogPostHashtag extends EditRecord
{
    protected static string $resource = BlogPostHashtagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
