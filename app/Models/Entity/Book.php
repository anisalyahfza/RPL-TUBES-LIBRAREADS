<?php

namespace App\Models\Entity;

use App\Models\AppModel;
use App\Traits\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends AppModel
{
    use HasFactory, SoftDeletes, Search;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'image',
        'writer',
        'isbn',
        'quantity',
        'synopsis',
        'category'
    ];

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

    public function getImageUrlAttribute()  {
        if($this->image){
            return $this->image;
        } else {
            return 'https://ui-avatars.com/api/?name='.urlencode($this->title).'&color=fff&background=990000&length=3&font-size=0.33';
        }
    }
}
