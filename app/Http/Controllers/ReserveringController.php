<?php
namespace App\Http\Controllers;

use App\Models\Reservering;
use Illuminate\Http\Request;

class ReserveringController extends Controller
{
    public function index()
    {
        $reserveringen = Reservering::all();
        return view('reserveringen.index', compact('reserveringen'));
    }
}
