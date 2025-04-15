<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class klant extends Model
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

    public function contact()
    {
        return $this->hasOne(Contact::class, 'persoon_id', 'id'); // Correct table and column names
    }
}
