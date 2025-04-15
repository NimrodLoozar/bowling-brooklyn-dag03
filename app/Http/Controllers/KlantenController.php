<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KlantenController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all personen with their related contact data (mobiel and email)
        $query = DB::table('contact')
            ->join('people', 'contact.PersoonId', '=', 'people.id')
            ->select(
                'people.*',
                'people.Voornaam as voornaam',
                'people.Tussenvoegsel as tussenvoegsel',
                'people.Achternaam as achternaam',
                'people.IsVolwassen as is_volwassen',
                'contact.Mobile as mobiel',
                'contact.Email as email',
                'contact.IsActive as is_active',
            );

        // Filter by date if search_date is provided
        if ($request->has('search_date') && $request->search_date) {
            $query->whereDate('datum_aangemaakt', $request->search_date);
        }

        $personen = $query->get();

        // Pass the data to the view
        return view('klanten.index', compact('personen'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $persoon = Klant::create($request->all());
        return response()->json($persoon, 201);
    }

    // Display the specified resource
    public function show($id)
    {
        $persoon = Klant::findOrFail($id);
        return response()->json($persoon);
    }

    // Edit the specified resource in storage
    public function edit($id)
    {
        $persoon = DB::table('contact')
        ->join('people', 'contact.PersoonId', '=', 'people.id')
        ->select(
            'people.*',
            'people.Voornaam as voornaam',
            'people.Tussenvoegsel as tussenvoegsel',
            'people.Achternaam as achternaam',
            'people.IsVolwassen as is_volwassen',
            'contact.Mobile as mobiel',
            'contact.Email as email',
            'contact.IsActive as is_active',
        );

        // Pass the data to the edit view
        return view('klanten.edit', compact('persoon'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $persoon = Klant::findOrFail($id);
        $persoon->update($request->all());
        return redirect()->route('klanten.index')->with('success', 'Klant updated successfully');
    }
    // Remove the specified resource from storage
    public function destroy($id)
    {
        $persoon = Klant::findOrFail($id);
        $persoon->delete();
        return response()->json(null, 204);
    }
}
