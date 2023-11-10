<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\BooksOuts;
use App\Models\BookUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 5 users
        $users = User::factory(5)->create();

        // Create 10 books
        $books = Book::factory(10)->create();

        // Assign two random books to each user without duplicates
        $users->each(function ($user) use ($books) {
            $randomBooks = $books->random(2)->pluck('id');
            $user->books()->sync($randomBooks);
        });
    }
}
