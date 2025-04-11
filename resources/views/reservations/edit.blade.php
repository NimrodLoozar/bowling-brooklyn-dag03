<x-layouts.app>
    <div class="min-h-screen bg-gray-900 text-white p-6">
        <h1>Edit Package Option for Reservation #{{ $reservation->id }}</h1>

        {{-- Error Message --}}
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('reservations.update', $reservation) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="PakketOptieId" class="block mb-2 font-semibold">Kies een nieuw optiepakket</label>
                <select name="PakketOptieId" id="PakketOptieId" class="bg-gray-800 text-white p-2 rounded w-full">
                    @foreach ($packageOptions as $option)
                        <option value="{{ $option->id }}" 
                            {{ $reservation->PakketOptieId == $option->id ? 'selected' : '' }}>
                            {{ $option->Naam }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold px-4 py-2 rounded">
                Wijzigen
            </button>
        </form>
    </div>
</x-layouts.app>