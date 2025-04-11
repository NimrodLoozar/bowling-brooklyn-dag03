<?php

namespace App\Http\Controllers;

use App\Models\Reservering;
use App\Models\PakketOptie;
use Illuminate\Http\Request;

class ReserveringController extends Controller
{
    public function index()
    {
        $reserveringen = Reservering::all();
        return view('reserveringen.index', compact('reserveringen'));
    }


    public function edit(Reservering $reservering)
    {
        $pakketopties = PakketOptie::all();
        return view('reserveringen.edit', compact('reservering', 'pakketopties'));
    }

    public function update(Request $request, Reservering $reservering)
    {
        $validated = $request->validate([
            'PakketOptieId' => 'required|exists:pakketoptie,id'
        ]);

        $reservering->update([
            'PakketOptieId' => $validated['PakketOptieId']
        ]);

        return redirect()->route('reserveringen.index')->with('success', 'Het optiepakket is gewijzigd');
    }
}
