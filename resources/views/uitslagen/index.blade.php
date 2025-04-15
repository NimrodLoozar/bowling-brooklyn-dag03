<x-layouts.app :title="__('Reserveringen Overzicht')">
    <div class="container mx-auto p-4">
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-4">Uitslagen Overzicht</h1>
        
        <form method="GET" action="{{ route('uitslagen.index') }}" class="mb-4 flex items-center gap-2">
            <label for="datum" class="font-medium">Datum:</label>
            <input type="date" name="datum" id="datum" value="{{ request('datum') }}" class="border rounded px-2 py-1">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Toon Reserveringen
            </button>
        </form>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Naam</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Datum</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aantal Uren</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Begintijd</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Eindtijd</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aantal Volwassenen</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aantal Kinderen</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reserveringen as $reservering)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">
                        @if($reservering->persoon)
                            {{ $reservering->persoon->voornaam }} {{ $reservering->persoon->achternaam }}
                        @else
                            <span class="text-gray-500">Geen persoon gekoppeld</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reservering->datum }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reservering->aantaluren }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reservering->begintijd }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reservering->eindtijd }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reservering->aantalvolwassenen }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $reservering->aantalkinderen }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('uitslagen.show', $reservering->id) }}" class="text-blue-500 hover:underline">
                            Bekijk Score
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
