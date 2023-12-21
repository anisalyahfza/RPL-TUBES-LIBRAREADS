<?php

namespace App\Models\Table;

use App\Models\Entity\Book;
use App\Models\User;
use App\Models\Entity\Loan;

class LoanTable extends Loan
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stock()
    {
        return $this->belongsTo(StockTable::class);
    }

    public function transactions()
    {
        return $this->hasMany(TransactionTable::class, 'loan_id');
    }
}
