<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    use HasFactory;

    protected $table = 'reservering';

    protected $fillable = [
        'persoon_id',
        'openingstijd_id',
        'baan_id',
        'pakketoptie_id',
        'reserveringsstatus',
        'reserveringsnummer',
        'datum',
        'aantaluren',
        'begintijd',
        'eindtijd',
        'aantalvolwassenen',
        'aantalkinderen',
    ];

    public function persoon()
    {
        return $this->belongsTo(Persoon::class, 'persoon_id');
    }
}
