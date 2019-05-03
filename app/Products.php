<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Products extends Model
{
    //
    protected $fillable = [
        'img' , 'name' , 'description', 'price' , 'category_id', 'sold', 'id'
    ];

    protected $hidden = [
        'amount'
    ];


    public function scopeProductsFilter($query,$filter) {

       return $filter->apply($query);
    }
}
