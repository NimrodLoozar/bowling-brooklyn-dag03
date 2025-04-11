<?php

namespace App\Http\Controllers;

use App\Models\Uitslag;
use App\Models\Reservering;
use Illuminate\Http\Request;

class UitslagController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservering::with('persoon');

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
            $uitslagen = Uitslag::whereHas('spel', function ($query) use ($reserveringId) {
                $query->where('reservering_id', $reserveringId);
            })
            ->with('spel.persoon')
            ->orderBy('aantalpunten', 'desc')
            ->get();

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
