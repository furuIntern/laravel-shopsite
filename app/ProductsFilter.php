<?php 
namespace App;

use App\QueryFilter;

class ProductsFilter extends QueryFilter
{
    public function popular($order = 'desc') {
        return $this->builder->orderBy('sold', $order);
    }
    public function rangePrice( $minPrice) {
        
        $this->builder->where('price' , '>=' , $minPrice[0] )
                      ->where('price' , '<=' , $minPrice[1]);
        
        return $this->builder; 
    }
    public function price($order) {
        return $this->builder->orderBy('price', $order);
    }

    public function time($order) {
        return $this->builder->orderBy('created_at', $order);
    }
}


