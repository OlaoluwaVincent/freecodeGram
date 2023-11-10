<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();
        $userBorrowedBooks = [];

        $userId = $user->id;

        $userBorrowedBooks = BookUser::where('user_id', $userId)->get()->map(function ($record) {
            return Book::find($record->book_id);
        });

        return view('dashboard')->with('userBorrowedBooks', $userBorrowedBooks);
    }

    public function showBooks()
    {
    }
}
