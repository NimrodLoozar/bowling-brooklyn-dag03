<x-layouts.app>
    <div class="min-h-screen bg-gray-900 text-white p-6">
        <h1 class="text-2xl font-bold mb-6">Wijzig Pakketoptie voor Reservering #{{ $reservering->id }}</h1>

        <form method="POST" action="{{ route('reserveringen.update', $reservering) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="PakketOptieId" class="block mb-2 font-semibold">Kies een nieuw optiepakket</label>
                <select name="PakketOptieId" id="PakketOptieId" class="bg-gray-800 text-white p-2 rounded w-full">
                    @foreach ($pakketopties as $optie)
                        <option value="{{ $optie->id }}" {{ $reservering->PakketOptieId == $optie->id ? 'selected' : '' }}>
                            {{ $optie->Naam }}
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
