<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Models\PackageOption;
use Illuminate\Http\Request;
use App\Models\Result;

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

    public function show()
    {
        $reservations = DB::table('reservations')
            ->join('people', 'reservations.PersoonId', '=', 'people.id')
            ->join('lanes', 'reservations.BaanId', '=', 'lanes.Nummer')
            ->select(
                'reservations.id',
                'reservations.datum',
                'reservations.AantalVolwassen as volwassenen',
                'reservations.AantalKinderen as kinderen',
                'lanes.Nummer as baan',
                'people.Roepnaam as roepnaam'
            )
            ->orderBy('reservations.datum', 'desc')
            ->get();

        return view('reservations.show', compact('reservations'));
    }

    public function edit($id)
    {
        $reservation = DB::table('reservations')->where('id', $id)->first();

        // Fetch lanes from the database
        $lanes = DB::table('lanes')->get();

        return view('reservations.edit', compact('reservation', 'lanes'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'lane_number' => 'required|integer|exists:lanes,Nummer',
        ]);

        // Find the selected lane
        $selectedLane = DB::table('lanes')->where('Nummer', $request->input('lane_number'))->first();

        // Check if the reservation includes children
        $reservation = DB::table('reservations')->where('id', $id)->first();
        if ($reservation->AantalKinderen > 0 && !$selectedLane->HeeftHek) {
            return redirect()->back()
                ->withErrors(['lane_number' => __('Deze baan is ongeschikt voor kinderen omdat deze geen hekjes heeft.')])
                ->withInput();
        }

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




















    // public function index()
    // {
    //     $reservations = Reservation::all();
    //     return view('reservations.index', compact('reservations'));
    // }

//     public function show(Reservation $reservation)
//     {
//         return view('reservations.show', compact('reservation'));
//     }
//     public function edit(Reservation $reservation)
//     {
//         $packageOptions = PackageOption::all();
//         return view('reservations.edit', compact('reservation', 'packageOptions'));
//     }


//     public function showResults()
//     {
//         return view('results.index');
//     }

//     public function handleResultsRequest(Request $request)
//     {
//         $request->validate([
//             'date' => 'required|date'
//         ]);

//         $date = $request->input('date');

//         // Fetch results for the selected date
//         $results = Result::select('Results.*')
//             ->join('Games', 'Results.SpelId', '=', 'Games.Id')
//             ->join('Reservations', 'Games.ReserveringId', '=', 'Reservations.Id')
//             ->join('People', 'Games.PersoonId', '=', 'People.Id')
//             ->whereDate('Reservations.Datum', $date)
//             ->orderByDesc('Results.Aantalpunten')
//             ->get();

//         if ($results->isEmpty()) {
//             return redirect()->route('results.show')
//                 ->with('error', 'Er is geen uitslag beschikbaar voor deze geselecteerde datum');
//         }

//         return view('results.index', [
//             'results' => $results,
//             'selectedDate' => $date
//         ]);
//     }

//     public function update(Request $request, Reservation $reservation)
//     {
//         $request->validate([
//             'PakketOptieId' => 'required|integer|exists:PackageOptions,Id'
//         ], [
//             'PakketOptieId.required' => 'Selecteer een optiepakket',
//             'PakketOptieId.exists' => 'Het geselecteerde pakket bestaat niet',
//         ]);

//         $packageOption = PackageOption::findOrFail($request->PakketOptieId);

//         if ($packageOption->Naam === 'Avond' && $reservation->AantalKinderen > 0) {
//             return redirect()->back()
//                 ->withInput()
//                 ->with('error', 'Het Avondpakket is niet geschikt voor kinderen');
//         }

//         $reservation->update(['PakketOptieId' => $request->PakketOptieId]);

//         return redirect()->route('reservations.index')
//             ->with('success', 'Optiepakket succesvol gewijzigd');
//     }
// }
