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
        return view('reservations.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update the reservation
        return redirect()->route('reservations.index');
    }

    public function destroy($id)
    {
        // Logic to delete the reservation
        return redirect()->route('reservations.index');
    }
}
