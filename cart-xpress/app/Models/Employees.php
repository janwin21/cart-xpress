<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = ['userID', 'jobTitle'];

    public function user() {
        return $this->belongsTo(User::class, 'userID');
    }

    public function representatives() {
        return $this->hasMany(Representatives::class, 'employeeID');
    }

}
