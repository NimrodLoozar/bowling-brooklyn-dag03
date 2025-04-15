<x-layouts.app>
    <div class="min-h-screen bg-gray-900 text-white p-6">
        <h1 class="text-3xl font-bold mb-6">Overzicht Uitslagen</h1>

        {{-- Date Selection Form --}}
        <form method="POST" action="{{ route('results.filter') }}" class="mb-8 max-w-md bg-gray-800 p-6 rounded-lg">
            @csrf
            <div class="mb-4">
                <label for="date" class="block mb-2 font-medium">Selecteer een datum:</label>
                <input 
                    type="date" 
                    name="date" 
                    id="date"
                    class="w-full bg-gray-700 text-white rounded-lg p-3 border border-gray-600 focus:border-indigo-500"
                    required
                >
            </div>
            <button 
                type="submit" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg"
            >
                Tonen
            </button>
        </form>

        {{-- Error Message --}}
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        {{-- Results Table --}}
        @isset($results)
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse bg-gray-800 rounded-lg">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">Naam</th>
                            <th class="px-4 py-3 text-left">Reserveringsnummer</th>
                            <th class="px-4 py-3 text-left">Datum</th>
                            <th class="px-4 py-3 text-left">Punten</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr class="hover:bg-gray-700">
                                <td class="px-4 py-3">
                                    {{ $result->game->person->Voornaam }} {{ $result->game->person->Achternaam }}
                                </td>
                                <td class="px-4 py-3">{{ $result->game->reservation->Reserveringsnummer }}</td>
                                <td class="px-4 py-3">{{ $result->game->reservation->Datum }}</td>
                                <td class="px-4 py-3 font-semibold text-indigo-400">{{ $result->Aantalpunten }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endisset
    </div>
</x-layouts.app>