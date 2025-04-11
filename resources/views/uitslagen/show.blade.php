<x-layouts.app :title="__('Uitslagen Overzicht')">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Uitslagen Overzicht</h1>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Naam</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aantal Punten</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uitslagen as $uitslag)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $uitslag->spel->persoon->voornaam }} {{ $uitslag->spel->persoon->achternaam }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $uitslag->aantalpunten }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
