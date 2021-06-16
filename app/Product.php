<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\propertie;
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image_name',
        'description',
        'visible',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function propertie()
    {
        return propertie::where('product_id',$this->id)->get();
    }
    public function product_attribute()
    {
        return product_attribute::where('product_id',$this->id)->get();
    }
    
    public function get_quantity()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','quantity']
                ])->first();
    }
    public function get_description()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','description']
                ])->first();
    }
    public function get_descriptionTR()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','description TR']
                ])->first();
    }
    public function get_how_use()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','How To Use']
                ])->first();
    }
    public function get_how_useTR()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','How To Use TR']
                ])->first();
    }
    public function get_active_ingredients()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Active Ingredients']
                ])->first();
    }
    public function get_active_ingredientsTR()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Active Ingredients TR']
                ])->first();
    }
    public function get_formulated_without()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Formulated Without']
                ])->first();
    }
    public function get_Price()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Price']
                ])->first();
    }
    public function get_BodyscrubDescription()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body scrub Description']
                ])->first();
    }
    public function get_BodyscrubDescriptionTR()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body scrub Description TR']
                ])->first();
    }
    
    public function get_BodyscrubQuantity()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body scrub Quantity']
                ])->first();
    }
    public function get_BodyscrubPrice()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body scrub Price']
                ])->first();
    }
    public function get_BodyoilDescription()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body oil Description']
                ])->first();
    }
    public function get_BodyoilDescriptionTR()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body oil Description TR']
                ])->first();
    }
    public function get_BodyoilPrice()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body oil Price']
                ])->first();
    }
    public function get_BodyoilQuantity()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body oil Quantity']
                ])->first();
    }
    public function get_BodymilkDescription()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body milk Description']
                ])->first();
    }
    public function get_BodymilkDescriptionTR()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body milk Description TR']
                ])->first();
    }
   
    public function get_BodymilkQuantity()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body milk Quantity']
                ])->first();
    }
    public function get_BodymilkPrice()
    {
        return product_attribute::where([
                ['product_id',$this->id],
                ['name','Body milk Price']
                ])->first();
    }
}
