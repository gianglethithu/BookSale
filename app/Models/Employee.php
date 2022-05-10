<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'group_id'];
    public function stores()
    {
        return $this->hasMany(Store::class, 'manager_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id', 'id');
    }
}
