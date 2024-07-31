<?php

namespace App\Models;

use App\Http\Controllers\FactoritemController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factor extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=['id'];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function factorItems()
    {
        return $this->hasMany(FactorItem::class, 'factor_id', 'id');
    }

}
