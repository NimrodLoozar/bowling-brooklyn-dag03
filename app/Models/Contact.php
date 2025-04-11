<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'persoon_id', 'mobiel', 'email', 'is_active', 'opmerking', 'datum_aangemaakt', 'datum_gewijzigd'
    ];

    /**
     * Define the inverse relationship with the Persoon model.
     */
    public function persoon()
    {
        return $this->belongsTo(Persoon::class, 'persoon_id', 'id'); // Ensure the foreign key matches the database
    }
}
