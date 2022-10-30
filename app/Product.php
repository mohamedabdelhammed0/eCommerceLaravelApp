<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','size','price','image'];

    public function category()
    {
        return   $this->belongsTo(\App\category::class);
    }

    public  function sizes(){
        return $this->belongsToMany(Size::class, 'product_sizes', 'size_id', 'product_id');
    }
    public function  hasTags($tagid){
        return in_array($tagid,$this->sizes->pluck('id')->toArray());
    }
    public function quantity(){
        return $this->hasMany(Quantity::class);
    }
}
