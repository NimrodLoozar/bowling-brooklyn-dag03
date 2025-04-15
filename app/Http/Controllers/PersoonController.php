<?php

namespace App\Http\Controllers;

use App\Models\Persoon;
use Illuminate\Http\Request;

class PersoonController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all personen with their related contact data (mobiel and email)
        $query = Persoon::with(['contact' => function ($query) {
            $query->select('id', 'persoon_id', 'mobiel', 'email');
        }]);

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
        $persoon = Persoon::create($request->all());
        return response()->json($persoon, 201);
    }

    // Display the specified resource
    public function show($id)
    {
        $persoon = Persoon::findOrFail($id);
        return response()->json($persoon);
    }

    public function edit($id)
    {
        $persoon = Persoon::with('contact')->findOrFail($id);

        return view('klanten.edit', compact('persoon'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $persoon = Persoon::findOrFail($id);

        // Validate the request with custom messages
        $validatedData = $request->validate([                               
            'voornaam' => 'required|string|max:255',
            'tussenvoegsel' => 'nullable|string|max:255',
            'achternaam' => 'required|string|max:255',
            'email' => 'nullable|email|unique:contacts,email,' . $persoon->contact->id,
            'mobiel' => 'nullable|string|max:20',
        ], [
            'email.unique' => 'Het e-mailadres is al in gebruik.',
        ]);

        // Convert checkbox values to boolean
        $data = $request->only([
            'voornaam',
            'tussenvoegsel',
            'achternaam',
        ]);
        $data['is_volwassen'] = $request->has('is_volwassen') ? 1 : 0;

        // Update Persoon fields
        $persoon->update($data);

        // Update Contact fields if they exist in the request
        if ($persoon->contact) {
            $persoon->contact->update($request->only(['email', 'mobiel']));
        }

        return redirect()->route('personen.index')->with('success', 'Klantgegevens succesvol bijgewerkt.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $persoon = Persoon::findOrFail($id);
        $persoon->delete();
        return response()->json(null, 204);
    }
}
