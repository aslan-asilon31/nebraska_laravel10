<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'qty',
        'total_price',
        'status',
    ];
}
