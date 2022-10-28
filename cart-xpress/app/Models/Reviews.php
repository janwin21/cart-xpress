<?php

namespace App\Models;

use Database\Factories\ReviewFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = ['createdByID', 'productID', 'rating', 'content'];

    public function product() {
        return $this->belongsTo(Products::class, 'productID');
    }

    public function replies() {
        return $this->belongsTo(Reviews::class, 'reviewID');
    }

    public function user() {
        return $this->belongsTo(User::class, 'createdByID');
    }

    protected static function newFactory() {
        return ReviewFactory::new();
    }

}
