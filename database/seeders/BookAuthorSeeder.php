<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookAuthorSeeder extends Seeder
{
    public function run(): void
    {
        $count = 80;
        $data = [];

        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'book_id' => Book::inRandomOrder()->first()->id,
                'author_id' => Author::inRandomOrder()->first()->id,
            ];
        }
        DB::table('books_authors')->insert($data);
    }
}
