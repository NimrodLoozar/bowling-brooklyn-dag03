<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spel extends Model
{
    use HasFactory;

    protected $table = 'spel';

    protected $fillable = ['persoon_id', 'reservering_id'];

    public function persoon()
    {
        return $this->belongsTo(Persoon::class, 'persoon_id');
    }
}
