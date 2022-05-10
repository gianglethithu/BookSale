<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderVoucher extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'voucher_id'];
    public function orders()
    {
        return $this->hasMany(Order::class, 'id', 'order_id');
    }
    public function vouchers()
    {
        return $this->hasMany(Voucher::class, 'id', 'voucher_id');
    }
}
