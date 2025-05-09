<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model {
    protected $with = [
        'user' ,
        'product',
    ];

    public function user (): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function product (): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    protected function totalPrice(): Attribute {
        return Attribute::make(get: fn ( $value , array $attributes ) => $this->quantity * $this->product->price);
    }
}
