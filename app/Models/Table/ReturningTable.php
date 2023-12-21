<?php

namespace App\Models\Table;

use App\Models\Entity\Returning;

class ReturningTable extends Returning
{
    public function loan()
    {
        return $this->belongsTo(LoanTable::class);
    }

    public function transactions()
    {
        return $this->hasMany(TransactionTable::class, 'returning_id');
    }
}
