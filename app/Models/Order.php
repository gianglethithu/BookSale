<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'customer_id'];
    public function books()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
