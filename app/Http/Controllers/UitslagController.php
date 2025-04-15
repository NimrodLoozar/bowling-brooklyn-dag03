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
        $query = DB::table('reservations')
            ->join('people', 'reservations.PersoonId', '=', 'people.id')
            ->select(
                'reservations.id',
                'reservations.datum',
                'reservations.AantalUren as aantaluren',
                'reservations.BeginTijd as begintijd',
                'reservations.EindTijd as eindtijd',
                'reservations.AantalVolwassen as aantalvolwassenen',
                'reservations.AantalKinderen as aantalkinderen',
                'people.Voornaam as voornaam',
                'people.Achternaam as achternaam',
                'people.Tussenvoegsel as tussenvoegsel',
                'people.Roepnaam as roepnaam'
            )
            ->distinct(); // Ensure unique rows

        // Filter by date if provided
        if ($request->has('datum') && $request->datum) {
            $query->where('reservations.datum', $request->datum);
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
            $reservering = DB::table('reservations')
                ->join('people', 'reservations.PersoonId', '=', 'people.id')
                ->select(
                    'reservations.*',
                    'reservations.BeginTijd as begintijd', // Ensure correct casing
                    'reservations.EindTijd as eindtijd',  // Ensure correct casing
                    'people.Voornaam as klant_voornaam',
                    'people.Achternaam as klant_achternaam',
                    'people.Tussenvoegsel as klant_tussenvoegsel'
                )
                ->where('reservations.id', $reserveringId)
                ->first();

            $uitslagen = DB::table('uitslag')
                ->join('spel', 'uitslag.spel_id', '=', 'spel.id')
                ->join('people', 'spel.persoon_id', '=', 'people.id')
                ->select(
                    'uitslag.id',
                    'uitslag.aantalpunten',
                    'people.Voornaam as gast_voornaam',
                    'people.Achternaam as gast_achternaam',
                    'people.Tussenvoegsel as gast_tussenvoegsel'
                )
                ->where('spel.reservering_id', $reserveringId)
                ->orderBy('uitslag.aantalpunten', 'desc')
                ->get();

            if ($uitslagen->isEmpty()) {
                throw new \Exception('Van de geselecteerde reservering zijn geen uitslagen bekend.');
            }

            return view('uitslagen.show', compact('uitslagen', 'reservering'));
        } catch (\Exception $e) {
            return redirect()->route('uitslagen.index')->with('error', $e->getMessage());
        }
    }
}
