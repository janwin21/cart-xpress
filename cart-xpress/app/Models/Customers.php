<?php

namespace App\Models;

use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'postalCode',
        'country',
        'creditLimit'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'userID');
    }

    public function shops() {
        return $this->hasMany(Shops::class, 'customerID');
    }

    protected static function newFactory() {
        return CustomerFactory::new();
    }
    
}
