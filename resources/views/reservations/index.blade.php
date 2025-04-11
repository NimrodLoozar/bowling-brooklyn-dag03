<x-layouts.app>
    <div class="min-h-screen bg-gray-900 text-white px-6 py-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Reservations Overview</h1>
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
                        <th class="px-4 py-3 text-left">Person ID</th>
                        <th class="px-4 py-3 text-left">Date</th>
                        <th class="px-4 py-3 text-left">Start Time</th>
                        <th class="px-4 py-3 text-left">End Time</th>
                        <th class="px-4 py-3 text-left">Reservation Number</th>
                        <th class="px-4 py-3 text-left">Package Option ID</th>
                        <th class="px-4 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($reservations as $reservation)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-4 py-3">{{ $reservation->id }}</td>
                            <td class="px-4 py-3">{{ $reservation->PersoonId }}</td>
                            <td class="px-4 py-3">{{ $reservation->Datum }}</td>
                            <td class="px-4 py-3">{{ $reservation->BeginTijd }}</td>
                            <td class="px-4 py-3">{{ $reservation->EindTijd }}</td>
                            <td class="px-4 py-3">{{ $reservation->Reserveringsnummer }}</td>
                            <td class="px-4 py-3">{{ $reservation->PakketOptieId }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('reservations.show', $reservation) }}" class="text-blue-400 hover:text-blue-300 font-medium mr-2">
                                    View
                                </a>
                                <a href="{{ route('reservations.edit', $reservation) }}" class="text-indigo-400 hover:text-indigo-300 font-medium">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>