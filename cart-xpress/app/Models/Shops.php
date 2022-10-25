<?php

namespace App\Models;

use Database\Factories\ShopFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;

    protected $fillable = [
        'customerID',
        'name',
        'email',
        'phone',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'postalCode',
        'country',
        'description',
        'backgroundImagePath'
    ];

    public function customer() {
        return $this->belongsTo(Customers::class, 'customerID');
    }

    protected static function newFactory() {
        return ShopFactory::new();
    }
}
