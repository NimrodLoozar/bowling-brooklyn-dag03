<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PackageOption; // Corrected from lowercase 'packageOption'

class Reservation extends Model
{
    protected $table = 'Reservations';
    protected $primaryKey = 'Id';

    protected $fillable = [
        'PersoonId',
        'OpeningstijdId',
        'BaanId',
        'PakketOptieId',
        'ReserveringStatus',
        'Reserveringsnummer',
        'Datum',
        'AantalUren',
        'BeginTijd',
        'EindTijd',
        'AantalVolwassen',
        'AantalKinderen',
    ];
}