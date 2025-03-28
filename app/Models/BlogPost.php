<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BlogPost extends Model implements HasMedia {
    use InteractsWithMedia;

    public function registerMediaCollections (): void {
        $this->addMediaCollection('image');
    }

    public function admin (): BelongsTo {
        return $this->belongsTo(Admin::class);
    }

    public function hashtags (): BelongsToMany {
        return $this->belongsToMany(BlogPostHashtag::class , 'blog_post_hashtag_mapping');
    }

    public function categories (): BelongsToMany {
        return $this->belongsToMany(BlogPostCategory::class , 'blog_post_category_mapping');
    }
}
