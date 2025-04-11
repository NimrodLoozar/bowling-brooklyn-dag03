<?php
namespace App\Http\Controllers;

use App\Models\Reservation; // Changed from Reservering
use App\Models\PackageOption; // Changed from PakketOptie
use Illuminate\Http\Request;

class ReservationController extends Controller  // Changed from ReserveringController
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function edit(Reservation $reservation)
    {
        $packageOptions = PackageOption::all();
        return view('reservations.edit', compact('reservation', 'packageOptions'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'PakketOptieId' => 'required|exists:PackageOptions,id'  // Changed table name
        ]);

        $reservation->update([
            'PakketOptieId' => $validated['PakketOptieId']
        ]);

        return redirect()->route('reservations.index')->with('success', 'The package option has been changed');
    }
}