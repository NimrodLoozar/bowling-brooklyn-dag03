<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class PackageOption extends Model
{
    protected $table = 'PackageOptions';
    protected $primaryKey = 'Id'; // Added line

    public $timestamps = false;
    
    protected $fillable = [
        'Naam',
        'Omschrijving',
    ];

    public function reserveringen()
    {
        return $this->hasMany(Reservation::class, 'PakketOptieId');
    }
}