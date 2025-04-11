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
            'aantalpunten' => 'required|integer',
        ]);

        $uitslag = Uitslag::findOrFail($id);
        $uitslag->update($request->only('aantalpunten'));

        return redirect()->route('uitslagen.index')->with('success', 'Uitslag bijgewerkt.');
    }

    public function show($reserveringId)
    {
        $uitslagen = Uitslag::whereHas('spel', function ($query) use ($reserveringId) {
            $query->where('reservering_id', $reserveringId);
        })
        ->with('spel.persoon')
        ->orderBy('aantalpunten', 'desc')
        ->get();

        $reservering = Reservering::with('persoon')->findOrFail($reserveringId);

        if ($uitslagen->isEmpty()) {
            return redirect()->route('uitslagen.index')->with('error', 'Van de geselecteerde reservering zijn geen uitslagen bekend.');
        }

        return view('uitslagen.show', compact('uitslagen', 'reservering'));
    }
}
