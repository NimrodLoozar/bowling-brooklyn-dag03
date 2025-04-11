<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uitslag extends Model
{
    use HasFactory;

    protected $table = 'uitslag';

    protected $fillable = ['spel_id', 'aantalpunten'];

    public function spel()
    {
        return $this->belongsTo(Spel::class, 'spel_id');
    }
}
