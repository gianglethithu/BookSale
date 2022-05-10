<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStore extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'store_id', 'number_in_stock'];
    public function books()
    {
        return $this->hasMany(Book::class, 'id', 'book_id');
    }
    public function stores()
    {
        return $this->hasMany(Store::class, 'id', 'store_id');
    }
}
