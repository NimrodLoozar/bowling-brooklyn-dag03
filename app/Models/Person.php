<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persoon'; // Zorg dat de tabelnaam klopt

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

    public function spellen()
    {
        return $this->hasMany(Spel::class, 'persoon_id', 'id'); // Zorg dat de relatie klopt
    }
}
