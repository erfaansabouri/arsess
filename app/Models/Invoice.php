<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    public function invoiceItems (): HasMany {
        return $this->hasMany(InvoiceItem::class , 'invoice_id');
    }

    // is paid attribute
    public function getIsPaidAttribute (): bool {
        return $this->paid_at !== null;
    }
}
