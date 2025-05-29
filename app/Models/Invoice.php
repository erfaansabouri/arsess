<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model {
    const STATUSES = [
        'init' => 'init' ,
        'process' => 'process' ,
        'sent' => 'sent' ,
    ];

    public static function booted(): void
    {
        static::creating(function (Invoice $invoice) {
            $invoice->code = self::generateUniqueCode();
        });

    }

    public static function generateUniqueCode () {
        $code = random_int(10000000 , 99999999);
        if ( self::where('code' , $code)->exists() ) {
            return self::generateUniqueCode();
        }

        return $code;
    }

    public function invoiceItems (): HasMany {
        return $this->hasMany(InvoiceItem::class , 'invoice_id');
    }

    public function user (): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // is paid attribute
    public function getIsPaidAttribute (): bool {
        return $this->paid_at !== null;
    }

    public function getAghlamForSmsAttribute () {
        $text = '';
        foreach ($this->invoiceItems as $invoiceItem){
            $text .= $invoiceItem->product->title . " " . $invoiceItem->quantity;
            $text .= "\n";
        }
        return $text;
    }
}
