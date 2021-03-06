<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name','parent_id'
    ];
    public function category(){
        return $this->hasMany('App\Category','parent_id');
    }
    
}
