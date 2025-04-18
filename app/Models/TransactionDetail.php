<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = ['transaction_id', 'item_id', 'quantity', 'price'];

    public function transaction()
    {
        return $this->belongsTo(Item::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
