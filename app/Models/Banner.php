<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Banner extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $with = ['media'];

    public function registerMediaCollections (): void {
        $this->addMediaCollection('image')->singleFile();
        $this->addMediaCollection('brand')->singleFile();
    }
}
