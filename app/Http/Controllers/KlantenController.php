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

        // Check if a valid column exists for filtering by date
        if ($request->has('search_date') && $request->search_date) {
            // Replace 'datum_aangemaakt' with a valid column name, e.g., 'created_at'
            $query->whereDate('people.created_at', $request->search_date);
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
            )
            ->where('people.id', $id) // Ensure we fetch the correct record
            ->first(); // Retrieve a single record

        // Pass the data to the edit view
        return view('klanten.edit', compact('persoon'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'voornaam' => 'required|string|max:255',
            'achternaam' => 'required|string|max:255',
            'mobiel' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            // Update the main person record
            $persoon = Klant::findOrFail($id);
            $persoon->update($validatedData);

            // Update the contact information
            DB::table('contact')
                ->where('PersoonId', $id)
                ->update([
                    'Mobile' => $request->input('mobiel'),
                    'Email' => $request->input('email'),
                    'IsActive' => $request->input('is_active', 1), // Default to 1 if not provided
                ]);

            return redirect()->route('klanten.index')->with('success', 'Klant updated successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            // Check for duplicate entry error
            if ($e->getCode() == 23000) {
                return redirect()->back()->withErrors(['message' => 'Het e-mailadres is al in gebruik.']);
            }

            // Re-throw the exception for other errors
            throw $e;
        }
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $persoon = Klant::findOrFail($id);
        $persoon->delete();
        return response()->json(null, 204);
    }
}
