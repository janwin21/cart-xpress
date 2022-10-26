<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;
use Database\Factories\OrderDetailFactory;

class OrderDetails extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;

    protected $primaryKey = ['orderID', 'productID'];
    public $incrementing = false;

    protected $fillable = [
        'orderID',
        'productID',
        'quantityOrdered',
        'miscellaneousFee'
    ];

    public function order() 
    {
        return $this->belongsTo(Orders::class, 'orderID');
    }

    public function product() 
    {
        return $this->belongsTo(Products::class, 'productID');
    }

    protected static function newFactory() {
        return OrderDetailFactory::new();
    }

}
