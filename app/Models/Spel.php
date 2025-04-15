<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person; // Update de import naar het juiste model

class Spel extends Model
{
    use HasFactory;

    protected $table = 'spel';

    protected $fillable = ['persoon_id', 'reservering_id'];

    public function persoon()
    {
        return $this->belongsTo(Person::class, 'persoon_id'); // Gebruik het juiste model
    }
}
