<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'type'
    ];

    public function products()
    {
    	return $this->hasMany('App\Product', 'id', 'category_id');
    }
    public function getproducts()
    {
    	return Product::where('category_id', $this->id)->get();
    }
    
}
