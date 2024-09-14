<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricesItem extends Model
{
    protected $table = 'prices_item';

    protected $fillable = [
        'item_id', 'size', 'price'
    ];


    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
