<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'People';
    protected $primaryKey = 'Id';
    
    public $timestamps = false;

    protected $fillable = [
        'TypePersoon',
        'Voornaam',
        'Tussenvoegsel',
        'Achternaam',
        'Roepnaam',
        'IsVolwassen'
    ];

    protected $casts = [
        'IsVolwassen' => 'boolean'
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'PersoonId', 'Id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'PersoonId', 'Id');
    }
}