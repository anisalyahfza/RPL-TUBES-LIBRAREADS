<?php

namespace App\Models\Table;

use App\Models\Entity\Stock;

class StockTable extends Stock
{
    public function book()
    {
        return $this->belongsTo(BookTable::class);
    }
}
