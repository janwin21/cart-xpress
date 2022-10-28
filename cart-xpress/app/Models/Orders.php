<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    public function orderDetails() {
        return $this->hasMany(OrderDetails::class, 'orderID');
    }

    public function customer() {
        return $this->belongsTo(Customers::class, 'customerID');
    }

    protected $fillable = [
        'customerID',
        'orderedDate',
        'requireDate',
        'deliveredDate',
        'reOrderedDate',
        'status',
        'comment'
    ];

    protected static function newFactory() {
        return OrderFactory::new();
    }

}
