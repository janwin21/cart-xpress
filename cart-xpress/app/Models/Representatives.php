<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;

class Representatives extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;

    protected $primaryKey = ['employeeID', 'customerID'];
    public $incrementing = false;

    protected $fillable = ['employeeID', 'customerID'];

    public function employee() {
        return $this->belongsTo(User::class, 'employeeID');
    }

    public function customer() {
        return $this->belongsTo(Customers::class, 'customerID');
    }

}
