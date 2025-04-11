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
            'PakketOptieId' => 'required|integer|exists:PackageOptions,Id'
        ], [
            'PakketOptieId.required' => 'Selecteer een optiepakket',
            'PakketOptieId.exists' => 'Het geselecteerde pakket bestaat niet',
        ]);

        $packageOption = PackageOption::findOrFail($request->PakketOptieId);

        if ($packageOption->Naam === 'Avond' && $reservation->AantalKinderen > 0) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Het Avondpakket is niet geschikt voor kinderen');
        }

        $reservation->update(['PakketOptieId' => $request->PakketOptieId]);

        return redirect()->route('reservations.index')
            ->with('success', 'Optiepakket succesvol gewijzigd');
    }
}
