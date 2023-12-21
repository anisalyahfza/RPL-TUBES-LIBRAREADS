<?php

namespace App\Models\Table;

use App\Models\Entity\Book;

class BookTable extends Book
{
    public function stocks()
    {
        return $this->hasMany(StockTable::class, 'book_id');
    }
}
