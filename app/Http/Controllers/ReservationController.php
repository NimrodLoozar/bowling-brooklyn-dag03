<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\PackageOption;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }
    public function edit(Reservation $reservation)
    {
        $packageOptions = PackageOption::all();
        return view('reservations.edit', compact('reservation', 'packageOptions'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'PakketOptieId' => 'required' // Removed exists validation
        ]);

        $packageOption = PackageOption::find($request->PakketOptieId);

        // Check if package exists
        if (!$packageOption) {
            return redirect()->back()
                ->with('error', 'Het geselecteerde optiepakket bestaat niet.');
        }

        // Prevent selecting 'Avond' if children are present
        if ($packageOption->Naam === 'Avond' && $reservation->AantalKinderen > 0) {
            return redirect()->back()
                ->with('error', 'Het optiepakket Avond is niet bedoeld voor kinderen.');
        }

        $reservation->update(['PakketOptieId' => $request->PakketOptieId]);

        return redirect()->route('reservations.index')
            ->with('success', 'Het optiepakket is gewijzigd');
    }
}
