<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia {
    use InteractsWithMedia;

    protected $with = [ 'media' ];

    public function registerMediaCollections (): void {
        $this->addMediaCollection('image')
             ->singleFile();
    }

    public function brand () {
        return $this->belongsTo(Brand::class);
    }

    public function categories (): BelongsToMany {
        return $this->belongsToMany(ProductCategory::class , 'product_category_mapping');
    }

    public function productAttributes (): HasMany {
        return $this->hasMany(ProductAttribute::class , 'product_id');
    }

    public function productPurchaseConditions (): HasMany {
        return $this->hasMany(ProductPurchaseCondition::class , 'product_id');
    }


}
