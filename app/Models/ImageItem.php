<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageItem extends Model
{
    protected $table = 'images_item';
    protected $fillable = [
        'item_id', 'image'
    ];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
