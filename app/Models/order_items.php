<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'prod_id',
        'price',
        'qty',

    ];
}
