<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    //


    protected $request;

    protected $builder;

    function __construct(Request $request) {
        
        $this->request = $request;
    }

    public function apply(Builder $builder) {
        $this->builder = $builder;

        foreach($this->filter() as $name => $value) {
            
            if(method_exists($this,$name)) {
                
                call_user_func_array([$this,$name] , array_filter([$this->filter()[$name]]));
            }
            
        }

        return $this->builder;
    } 
    public function filter() {
        return $this->request->all();
    }

}
