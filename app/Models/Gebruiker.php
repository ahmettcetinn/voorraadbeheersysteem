<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gebruiker extends Model
{
    protected $table = 'Gebruiker';
    protected $primaryKey = 'GebruikerID';
    protected $fillable = ['Naam', 'Rol'];
}