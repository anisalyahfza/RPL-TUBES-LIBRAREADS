<?php

namespace App\Models\Table;

use App\Models\Entity\Library;
use App\Models\User;

class LibraryTable extends Library
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->belongsTo(TransactionTable::class);
    }
}
