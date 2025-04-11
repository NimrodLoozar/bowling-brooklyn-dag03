<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'Games';
    protected $primaryKey = 'Id';

    protected $fillable = [
        'PersoonId',
        'ReserveringId'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'PersoonId', 'Id');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'ReserveringId', 'Id');
    }

    public function result()
    {
        return $this->hasOne(Result::class, 'SpelId', 'Id');
    }
}