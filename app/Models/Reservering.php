<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    use HasFactory;

    protected $table = 'Reservering';
    protected $primaryKey = 'ReserveringID';
    public $timestamps = false;

    protected $fillable = [
        'ProductID',
        'GebruikerID',
        'Aantal',
        'Datum',
        'Status'
    ];

    // Relatie naar Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    // Relatie naar Gebruiker
    public function gebruiker()
    {
        return $this->belongsTo(Gebruiker::class, 'GebruikerID', 'GebruikerID');
    }
}