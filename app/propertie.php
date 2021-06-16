<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class propertie extends Model
{
    protected $fillable = [
        'title',
        'product_id'
    ];

    public function product()
    {
    	return $this->belongsTo('App\product','product_id','id');
    }
}
