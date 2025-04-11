<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'Results';
    protected $primaryKey = 'Id';

    protected $fillable = [
        'SpelId',
        'Aantalpunten'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'SpelId', 'Id');
    }
}