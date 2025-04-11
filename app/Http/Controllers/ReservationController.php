<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sortColumn', 'datum'); // Default to 'datum'
        $selectedDate = $request->input('selectedDate');

        // Validate that the selected date is not in the future compared to the dates in the table
        if ($selectedDate) {
            $maxDateInTable = DB::table('reservations')->max('datum');
            if (strtotime($selectedDate) > strtotime($maxDateInTable)) {
                return redirect()->route('reservations.index')
                    ->withErrors(['selectedDate' => __('Er is geen informatie over deze periode')]);
            }
        }

        $query = DB::table('reservations')
            ->join('people', 'reservations.PersoonId', '=', 'people.id')
            ->select(
                'reservations.id', // Include the id column
                'reservations.datum',
                'reservations.AantalUren as aantaluren',
                'reservations.BeginTijd as begintijd',
                'reservations.EindTijd as eindtijd',
                'reservations.AantalVolwassen as aantalvolwassenen',
                'reservations.AantalKinderen as aantalkinderen',
                'people.Roepnaam as roepnaam'
            );

        // Filter by selected date if provided
        if ($selectedDate) {
            $query->where('reservations.datum', '<=', $selectedDate);
        }

        $reservations = $query->orderBy($sortColumn, 'desc')->get();

        return view('reservations.index', compact('reservations', 'sortColumn', 'selectedDate'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        // Logic to store the reservation
        return redirect()->route('reservations.index');
    }

    public function show($id)
    {
        return view('reservations.show', compact('id'));
    }

    public function edit($id)
    {
        $reservation = DB::table('reservations')->where('id', $id)->first();

        // Hardcoded lanes
        $lanes = [
            ['number' => 1, 'is_kids_friendly' => true],
            ['number' => 2, 'is_kids_friendly' => false],
            ['number' => 3, 'is_kids_friendly' => true],
            ['number' => 4, 'is_kids_friendly' => false],
            ['number' => 5, 'is_kids_friendly' => true],
            ['number' => 6, 'is_kids_friendly' => false],
            ['number' => 7, 'is_kids_friendly' => true],
            ['number' => 8, 'is_kids_friendly' => false],
        ];

        return view('reservations.edit', compact('reservation', 'lanes'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'lane_number' => 'required|integer',
        ]);

        // Update the reservation in the database
        DB::table('reservations')
            ->where('id', $id)
            ->update([
                'BaanId' => $request->input('lane_number'),
            ]);

        // Redirect back to the reservations index with a success message
        return redirect()->route('reservations.index')->with('success', __('Reservering succesvol bijgewerkt.'));
    }

    public function destroy($id)
    {
        // Logic to delete the reservation
        return redirect()->route('reservations.index');
    }
}
