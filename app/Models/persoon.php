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

    /**
     * Define a one-to-one relationship with the Contact model.
     */
    public function contact()
    {
        return $this->hasOne(Contact::class, 'persoon_id', 'id'); // Correct table and column names
    }
}
