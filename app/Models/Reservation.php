<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\packageOption;

class Reservation extends Model
{
    protected $table = 'Reservations';
    protected $primaryKey = 'Id'; // Added line


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