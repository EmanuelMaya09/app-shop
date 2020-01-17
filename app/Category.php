<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Validar
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para la categoría.',
        'name.min' => 'El nombre de la categoría debe tener al menos 3 carecteres.',
        'description.max' => 'La descrpción sólo admite hasta 250 caracteres.', 
    ];
    public static $rules = [
        'name' => 'required|Min:3',
        'description' => 'max:200'
        
    ];
    protected $fillable = ['name', 'description'];
    //category->products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredProduct = $this->products()->first();
        return $featuredProduct->featured_image_url;
    }
}
