<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Gebruiker extends Authenticatable
{
    use Notifiable;

    protected $table = 'Gebruiker';
    protected $primaryKey = 'GebruikerID';
    public $timestamps = false;

    protected $fillable = [
        'Naam',
        'email',
        'Rol',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relatie naar reserveringen
    public function reserveringen()
    {
        return $this->hasMany(Reservering::class, 'GebruikerID', 'GebruikerID');
    }

    // Check of gebruiker docent is
    public function isDocent()
    {
        return $this->Rol === 'docent';
    }

    // Check of gebruiker student is
    public function isStudent()
    {
        return $this->Rol === 'student';
    }
}