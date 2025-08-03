<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'name' => 'The Psychology of Money',
                'author' => 'Morgan Housel',
                'image' => 'https://images.unsplash.com/photo-1553729459-efe14ef6055d?fit=crop&w=500&q=80',
                'price' => 399
            ],
            [
                'name' => 'Atomic Habits',
                'author' => 'James Clear',
                'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?fit=crop&w=500&q=80',
                'price' => 499
            ],
            [
                'name' => 'Deep Work',
                'author' => 'Cal Newport',
                'image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?fit=crop&w=500&q=80',
                'price' => 350
            ]
        ];


        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
