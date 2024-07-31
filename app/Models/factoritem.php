<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class factoritem extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=['id',

    ];

    public function factor()
    {
        return $this->belongsTo(Factor::class, 'factor_id', 'id');
    }
}
