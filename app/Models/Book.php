<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookPhoto;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'title', 'avatar', 'publisher_id', 'price'];
    public function photos()
    {
        return $this->hasMany(BookPhoto::class, 'book_id', 'id');
    }
    public function authors()
    {
        return $this->hasMany(BookAuthor::class, 'book_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany(OrderItem::class, 'book_id', 'id');
    }

}
