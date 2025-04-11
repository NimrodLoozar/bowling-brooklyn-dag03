<x-layouts.app>
    <div class="min-h-screen bg-gray-900 text-white p-6">
        <h1 class="text-2xl font-bold mb-6">Optiepakket wijzigen voor reservering #{{ $reservation->id }}</h1>

        {{-- Error Container --}}
        @if($errors->any() || session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                @if(session('error'))
                    <p>{{ session('error') }}</p>
                @endif
            </div>
        @endif

        <form method="POST" action="{{ route('reservations.update', $reservation) }}" class="max-w-md">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="pakket-select" class="block mb-2 font-medium">
                    Kies een nieuw optiepakket
                </label>
                <select 
                    name="PakketOptieId" 
                    id="pakket-select"
                    class="w-full bg-gray-800 text-white rounded-lg p-3 border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900"
                    required
                >
                    <option value="" disabled>Maak een keuze</option>
                    @foreach($packageOptions as $option)
                        <option 
                            value="{{ $option->Id }}"
                            {{ old('PakketOptieId', $reservation->PakketOptieId) == $option->Id ? 'selected' : '' }}
                        >
                            {{ $option->Naam }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-4">
                <button 
                    type="submit" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg transition-colors"
                >
                    Opslaan
                </button>
                <a 
                    href="{{ route('reservations.index') }}" 
                    class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-2 rounded-lg transition-colors"
                >
                    Annuleren
                </a>
            </div>
        </form>
    </div>
</x-layouts.app>