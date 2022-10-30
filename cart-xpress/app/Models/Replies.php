<?php

namespace App\Models;

use Database\Factories\ReplyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;

    protected $fillable = ['createdByID', 'reviewID', 'content'];

    public function review() {
        return $this->belongsTo(Reviews::class, 'reviewID');
    }

    public function user() {
        return $this->belongsTo(User::class, 'createdByID');
    }

    protected static function newFactory() {
        return ReplyFactory::new();
    }

}
