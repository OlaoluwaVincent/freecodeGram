<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    //
    function show()
    {
        $user = Auth::user();

        $books = Book::all()->sortBy('title');
        $borrowedBooks = BookUser::where('user_id', $user->id)->get();

        $singleBooks = [];

        if ($borrowedBooks->isNotEmpty()) {
            foreach ($borrowedBooks as $bookUser) {
                $book = Book::find($bookUser->book_id);

                if ($book) {
                    $singleBooks[] = $book;
                }
            }
        }

        return view('inventory')->with('booksLibrary', $books)->with('borrowedBooks', $borrowedBooks)->with('singleBooks', $singleBooks);
    }


    public function borrowBook($bookId)
    {
        $user = Auth::user();

        // You should check if the user has already borrowed this book
        $existing_Borrow = BookUser::where('user_id', $user->id)
            ->where('book_id', $bookId)
            ->first();

        if ($existing_Borrow) {
            return back()->with('message', 'You have already borrowed this book.');
        }

        // If the user hasn't borrowed the book before, create a new entry in the BookUser table
        $bookData = [
            'book_id' => $bookId,
            'user_id' => $user->id,
        ];

        $newBook = BookUser::create($bookData);

        if ($newBook) {
            // Flash the success message to the session
            return back()->with('success', 'Request created Successfully')->with('newBook', $newBook);
        }

        // Flash a failure message to the session
        return back()->with('error', 'Request Failed, try again later');
    }



    function buyBook()
    {
        return back()->with('message', 'Listing updated Successfully');
    }

    function searchBooks()
    {
    }
}
