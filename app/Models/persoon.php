<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class persoon extends Model
{
    protected $fillable = [
        'voornaam',
        'tussenvoegsel',
        'achternaam',
        'is_volwassen',
        'is_active',
        'opmerking',
        'datum_aangemaakt',
        'datum_gewijzigd',
    ];
}
