<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_attribute extends Model
{
    protected $fillable = [
        'name',
        'value',
        'type'
    ];
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
