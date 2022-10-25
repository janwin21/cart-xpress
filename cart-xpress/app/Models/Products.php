<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopID',
        'categoryID',
        'name',
        'size',
        'description',
        'quantityInStock',
        'price',
        'discount',
        'imagePath',
        'durationOfDeliveryByHour',
    ];

    public function shop() {
        return $this->belongsTo(Shops::class, 'shopID');
    }

    protected static function newFactory() {
        return ProductFactory::new();
    }
    
}
