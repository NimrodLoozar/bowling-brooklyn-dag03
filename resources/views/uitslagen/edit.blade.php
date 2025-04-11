<x-layouts.app :title="__('Uitslag Bewerken')">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Uitslag Bewerken</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('uitslagen.show', $uitslag->spel->reservering_id) }}";
                }, 5000);
            </script>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('uitslagen.update', $uitslag->id) }}">
            @csrf
            <div class="mb-4">
                <label for="aantalpunten" class="block text-sm font-medium text-gray-700">Aantal Punten:</label>
                <input type="number" name="aantalpunten" id="aantalpunten" value="{{ old('aantalpunten', $uitslag->aantalpunten) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Wijzigen
            </button>
        </form>
    </div>
</x-layouts.app>
