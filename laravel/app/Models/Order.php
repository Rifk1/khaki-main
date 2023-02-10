<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'country',
        'pincode',
        'total_price',
        'status',
        'massage',
        'tracking_no',

    ];
    // public function products()
    // {
    //     return $this->belongsTo(Product::class, 'user_id', 'id');
    // }
    // public function orders_items()
    // {
    //     return $this->belongsTo(OrderItem::class, 'user_id', 'id');
    // }

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function orderitem()
    {
        return $this->belongsTo(OrderItem::class, 'user_id', 'id');
    }
}
