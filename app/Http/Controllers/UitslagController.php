<?php

namespace App\Http\Controllers;

use App\Models\Uitslag;
use App\Models\Reservering;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UitslagController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('uitslag')
            ->join('spel', 'uitslag.spel_id', '=', 'spel.id')
            ->join('reservations', 'spel.reservering_id', '=', 'reservations.id')
            ->join('people', 'reservations.PersoonId', '=', 'people.id')
            ->select(
                'uitslag.id',
                'uitslag.aantalpunten',
                'reservations.datum',
                'reservations.AantalUren as aantaluren',
                'reservations.BeginTijd as begintijd',
                'reservations.EindTijd as eindtijd',
                'reservations.AantalVolwassen as aantalvolwassenen',
                'reservations.AantalKinderen as aantalkinderen',
                'people.Roepnaam as roepnaam',
                'people.Voornaam as voornaam',
                'people.Achternaam as achternaam',
                'people.Tussenvoegsel as tussenvoegsel',
            );
        // Reservering::with('people');

        if ($request->has('datum') && $request->datum) {
            $query->where('datum', $request->datum);
        }

        $reserveringen = $query->get();

        return view('uitslagen.index', compact('reserveringen'));
    }

    public function edit($id)
    {
        $uitslag = Uitslag::findOrFail($id);
        return view('uitslagen.edit', compact('uitslag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'aantalpunten' => 'required|integer|max:300',
        ], [
            'aantalpunten.max' => 'Het aantal punten is niet geldig, voer een waarde in kleiner of gelijk aan 300.',
        ]);

        $uitslag = Uitslag::findOrFail($id);
        $uitslag->update($request->only('aantalpunten'));

        return redirect()->route('uitslagen.show', $uitslag->spel->reservering_id)
            ->with('success', 'Aantal punten is gewijzigd.');
    }

    public function show($reserveringId)
    {
        try {
            $query = DB::table('uitslag')
                ->join('spel', 'uitslag.spel_id', '=', 'spel.id')
                ->join('reservations', 'spel.reservering_id', '=', 'reservations.id')
                ->join('people', 'reservations.PersoonId', '=', 'people.id')
                ->select(
                    'uitslag.id',
                    'uitslag.aantalpunten',
                    'reservations.datum',
                    'reservations.AantalUren as aantaluren',
                    'reservations.BeginTijd as begintijd',
                    'reservations.EindTijd as eindtijd',
                    'reservations.AantalVolwassen as aantalvolwassenen',
                    'reservations.AantalKinderen as aantalkinderen',
                    'people.Roepnaam as roepnaam',
                    'people.Voornaam as voornaam',
                    'people.Achternaam as achternaam',
                    'people.Tussenvoegsel as tussenvoegsel',
                )
                ->where('reservations.id', $reserveringId)
                ->orderBy('uitslag.aantalpunten', 'desc');

            $uitslagen = $query->get();

            $reservering = Reservering::with('persoon')->findOrFail($reserveringId);

            if ($uitslagen->isEmpty()) {
                throw new \Exception('Van de geselecteerde reservering zijn geen uitslagen bekend.');
            }

            return view('uitslagen.show', compact('uitslagen', 'reservering'));
        } catch (\Exception $e) {
            return redirect()->route('uitslagen.index')->with('error', $e->getMessage());
        }
    }
}
