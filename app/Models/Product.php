<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'Product';
    protected $primaryKey = 'ProductID';
    public $timestamps = false;
    protected $fillable = ['Naam', 'Type', 'Aantal', 'Locatie', 'CategorieID'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'CategorieID', 'CategorieID');
    }
}