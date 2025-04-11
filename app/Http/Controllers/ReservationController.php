<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\PackageOption;
use Illuminate\Http\Request;
use App\Models\Result;

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


    public function showResults()
    {
        return view('results.index');
    }

    public function handleResultsRequest(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);

        $date = $request->input('date');

        // Fetch results for the selected date
        $results = Result::select('Results.*')
            ->join('Games', 'Results.SpelId', '=', 'Games.Id')
            ->join('Reservations', 'Games.ReserveringId', '=', 'Reservations.Id')
            ->join('People', 'Games.PersoonId', '=', 'People.Id')
            ->whereDate('Reservations.Datum', $date)
            ->orderByDesc('Results.Aantalpunten')
            ->get();

        if ($results->isEmpty()) {
            return redirect()->route('results.show')
                ->with('error', 'Er is geen uitslag beschikbaar voor deze geselecteerde datum');
        }

        return view('results.index', [
            'results' => $results,
            'selectedDate' => $date
        ]);
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
