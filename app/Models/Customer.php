<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function factors()
    {
        return $this->hasMany(Factor::class, 'customer_id', 'id');
    }
}


