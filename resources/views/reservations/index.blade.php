<x-layouts.app>
    <div class="min-h-screen bg-gray-900 text-white px-6 py-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Overzicht Reserveringen</h1>
        @if (session('success'))
            <div class="mb-4 bg-green-500 text-white p-3 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse rounded-lg overflow-hidden shadow-lg bg-gray-800">
                <thead class="bg-gray-700 text-gray-300 uppercase text-sm tracking-wider">
                    <tr>
                        <th class="px-4 py-3 text-left">Persoon</th>
                        <th class="px-4 py-3 text-left">Datum</th>
                        <th class="px-4 py-3 text-left">Starttijd</th>
                        <th class="px-4 py-3 text-left">Eindtijd</th>
                        <th class="px-4 py-3 text-left">Reserveringsnummer</th>
                        <th class="px-4 py-3 text-left">Pakketoptie</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Aantal uren</th>
                        <th class="px-4 py-3 text-left">Volwassenen</th>
                        <th class="px-4 py-3 text-left">Kinderen</th>
                        <th class="px-4 py-3 text-left">Acties</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($reservations as $reservation)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-4 py-3">
                                @if($reservation->person)
                                    {{ $reservation->person->Voornaam }} 
                                    {{ $reservation->person->Tussenvoegsel }} 
                                    {{ $reservation->person->Achternaam }}
                                @else
                                    Onbekend
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $reservation->Datum }}</td>
                            <td class="px-4 py-3">{{ $reservation->BeginTijd }}</td>
                            <td class="px-4 py-3">{{ $reservation->EindTijd }}</td>
                            <td class="px-4 py-3">{{ $reservation->Reserveringsnummer }}</td>
                            <td class="px-4 py-3">
                                @if($reservation->packageOption)
                                    {{ $reservation->packageOption->Naam }}
                                @else
                                    Geen
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $reservation->ReserveringStatus }}</td>
                            <td class="px-4 py-3">{{ $reservation->AantalUren }}</td>
                            <td class="px-4 py-3">{{ $reservation->AantalVolwassen }}</td>
                            <td class="px-4 py-3">{{ $reservation->AantalKinderen ?? '0' }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('reservations.show', $reservation) }}" class="text-blue-400 hover:text-blue-300 font-medium mr-2">
                                    Bekijken
                                </a>
                                <a href="{{ route('reservations.edit', $reservation) }}" class="text-indigo-400 hover:text-indigo-300 font-medium">
                                    Wijzigen
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>