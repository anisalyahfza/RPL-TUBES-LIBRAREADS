<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Table\BookTable;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookTable::firstOrCreate([
            'id' => Str::random(20),
            'title' => 'Book 1',
            'writer' => 'Author 1',
            'isbn' => '01939501901',
            'quantity' => '3',
            'category' => 'Science Fiction',
        ]);
        BookTable::firstOrCreate([
            'id' => Str::random(20),
            'title' => 'Book 2',
            'writer' => 'Author 2',
            'isbn' => '01939501901',
            'quantity' => '3',
            'category' => 'Science Fiction',
        ]);
        BookTable::firstOrCreate([
            'id' => Str::random(20),
            'title' => 'Book 3',
            'writer' => 'Author 3',
            'isbn' => '01939501901',
            'quantity' => '3',
            'category' => 'Science Fiction',
        ]);
        BookTable::firstOrCreate([
            'id' => Str::random(20),
            'title' => 'Book 4',
            'writer' => 'Author 4',
            'isbn' => '01939501901',
            'quantity' => '3',
            'category' => 'Science Fiction',
        ]);
    }
}
