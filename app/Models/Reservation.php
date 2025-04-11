<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PackageOption; // Corrected from lowercase 'packageOption'

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'Reservations';
    protected $primaryKey = 'Id';

    public $timestamps = false;

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

    public function packageOption()
    {
        return $this->belongsTo(PackageOption::class, 'PakketOptieId', 'Id');
    }
    public function person()
    {
        return $this->belongsTo(Person::class, 'PersoonId', 'Id');
    }
}
