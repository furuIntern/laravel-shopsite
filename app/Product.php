<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name','price','amount','category_id','sold','description'
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
