<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order_items;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'status',
        'message',
        'total_price',
        'tracking_no',

    ]; 
    public function orderitmes(){
        return $this->hasMany(order_items::class);
    }
}
