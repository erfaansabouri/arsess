<?php

namespace App\Filament\Resources\BlogPostHashtagResource\Pages;

use App\Filament\Resources\BlogPostHashtagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogPostHashtag extends CreateRecord
{
    protected static string $resource = BlogPostHashtagResource::class;
}
