<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Products extends Model
{
    //
    protected $fillable = [
        'name' , 'description', 'price' , 'sold', 'id'
    ];

    protected $hidden = [
        'amount'
    ];


    public function scopeProductsFilter($query,$filter) {

       return $filter->apply($query);
    }

    public function scopeItemsCategory($query,$parent) {

        $query->orWhere('category_id',$parent->id);
        foreach($parent->children as $value) {
            
            $query->orWhere('category_id', $value->id);
        }
        
        return $query;
    }

    public function comments()
    {
        return $this->hasMany('App\comment');
    }
}
