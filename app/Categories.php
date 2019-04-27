<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //
    protected $fillable = [
        'name'
    ];


    public function parent() {
        return $this->belongsTo('App\Categories', 'parent_id');
    }

    public function children() {
        return $this->hasmany('App\Categories', 'parent_id');
    }
}
