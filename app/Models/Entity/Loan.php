<?php

namespace App\Models\Entity;

use App\Models\AppModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends AppModel
{
    use HasFactory, SoftDeletes;

    const STATUS_ONPERIOD = 'ON PERIOD';
    const STATUS_DUE = 'DUE';
    const STATUS_RETURNED = 'RETURNED';

    const STATUS = ['ON PERIOD', 'DUE'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'loans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'stock_id', 'loan_date', 'expected_return', 'code', 'status', 'returning_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        //
    ];

    public function getStatusColorAttribute()
    {
        if ($this->status == self::STATUS_ONPERIOD) {
            return 'light-warning';
        } elseif ($this->status == self::STATUS_DUE) {
            return 'light-danger';
        } elseif ($this->status == self::STATUS_RETURNED) {
            return 'secondary';
        }
    }
}
