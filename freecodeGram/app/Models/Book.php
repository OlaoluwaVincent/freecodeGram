<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user', 'book_id', 'user_id');
    }
}
