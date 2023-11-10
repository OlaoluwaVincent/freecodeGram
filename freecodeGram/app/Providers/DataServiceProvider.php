<?php

namespace App\Providers;

use App\Models\Book;
use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        //
        $books = Book::all()->sortBy('title'); // Fetch all data from the Book model
        view()->share('allBooks', $books);
    }
}
