<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookUser extends Model
{
    use HasFactory;

    protected $table = 'book_user';
    public $timestamps = false;
    protected $fillable = ['book_id', 'user_id'];

    public function book()
    {
        return $this->belongsToMany(Book::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
