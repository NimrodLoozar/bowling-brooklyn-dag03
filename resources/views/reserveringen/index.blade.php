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
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Persoon ID</th>
                        <th class="px-4 py-3 text-left">Datum</th>
                        <th class="px-4 py-3 text-left">Begintijd</th>
                        <th class="px-4 py-3 text-left">Eindtijd</th>
                        <th class="px-4 py-3 text-left">Reserveringsnummer</th>
                        <th class="px-4 py-3 text-left">Pakketoptie ID</th>
                        <th class="px-4 py-3 text-left">Actie</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($reserveringen as $reservering)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-4 py-3">{{ $reservering->id }}</td>
                            <td class="px-4 py-3">{{ $reservering->PersoonId }}</td>
                            <td class="px-4 py-3">{{ $reservering->Datum }}</td>
                            <td class="px-4 py-3">{{ $reservering->BeginTijd }}</td>
                            <td class="px-4 py-3">{{ $reservering->EindTijd }}</td>
                            <td class="px-4 py-3">{{ $reservering->Reserveringsnummer }}</td>
                            <td class="px-4 py-3">{{ $reservering->PakketOptieId }}</td>
                            <td class="px-4 py-3">
                                <a href="#" class="text-indigo-400 hover:text-indigo-300 font-medium">Wijzigen</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
