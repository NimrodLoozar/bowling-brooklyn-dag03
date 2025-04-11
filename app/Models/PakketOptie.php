<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PakketOptie extends Model
{
    protected $table = 'pakketoptie';

    protected $fillable = [
        'Naam',
        'Omschrijving',
    ];

    public function reserveringen()
    {
        return $this->hasMany(Reservering::class, 'PakketOptieId');
    }
}
