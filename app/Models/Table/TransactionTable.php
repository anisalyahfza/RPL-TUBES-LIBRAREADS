<?php

namespace App\Models\Table;

use App\Models\User;
use App\Models\Entity\Transaction;

class TransactionTable extends Transaction
{
    public function loan()
    {
        return $this->belongsTo(LoanTable::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
