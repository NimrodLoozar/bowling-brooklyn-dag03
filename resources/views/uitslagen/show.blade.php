<x-layouts.app :title="__('Uitslagen Overzicht')">
    <div class="container mx-auto p-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-4">Uitslagen Overzicht</h1>

        <div class="mb-4">
            <h2 class="text-lg font-semibold">Reservering Informatie</h2>
            <p><strong>Klant:</strong> {{ $reservering->klant_voornaam }} {{ $reservering->klant_tussenvoegsel }} {{ $reservering->klant_achternaam }}</p>
            <p><strong>Datum:</strong> {{ $reservering->datum }}</p>
            <p><strong>Begintijd:</strong> {{ $reservering->begintijd }}</p>
            <p><strong>Eindtijd:</strong> {{ $reservering->eindtijd }}</p>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Naam</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aantal Punten</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Wijzigen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uitslagen as $uitslag)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $uitslag->gast_voornaam }} {{ $uitslag->gast_tussenvoegsel }} {{ $uitslag->gast_achternaam }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $uitslag->aantalpunten ?? 'Geen score' }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('uitslagen.edit', $uitslag->id) }}" class="text-blue-500 hover:underline">
                            Bewerken
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <a href="{{ route('uitslagen.index') }}" class="bg-gray-500 text-black px-4 py-2 rounded hover:bg-gray-600">
                Terug naar Overzicht
            </a>
        </div>
    </div>
</x-layouts.app>
