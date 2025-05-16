<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceItem extends Model
{
    public function invoice (): BelongsTo {
        return $this->belongsTo(Invoice::class);
    }

    public function product (): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
