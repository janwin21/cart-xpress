<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'backgroundImagePath'];

    protected static function newFactory() {
        return CategoryFactory::new();
    }

    public function products() {
        return $this->hasMany(Products::class, 'categoryID');
    }

}
