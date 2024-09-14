<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'rating',
        'popular',
        'categorie_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'categorie_id');
    }

    public function images()
    {
        return $this->hasMany(ImageItem::class,'item_id');
    }

    public function prices()
    {
        return $this->hasMany(PricesItem::class,'item_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
    public function isFavoriteByUser($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }
}

