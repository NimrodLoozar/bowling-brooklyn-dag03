@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Overzicht Klanten</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('personen.index') }}" class="mb-4">
        <label for="search_date" class="block text-sm font-medium text-gray-700">Zoek op datum:</label>
        <div class="flex items-center mt-2">
            <input type="date" id="search_date" name="search_date" value="{{ request('search_date') }}" class="border border-gray-300 rounded px-4 py-2 w-1/3">
            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Zoeken</button>
        </div>
    </form>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">Naam</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Mobiel</th>
                <th class="border border-gray-300 px-4 py-2">Volwassen</th>
                <th class="border border-gray-300 px-4 py-2">Actief</th>
                <th class="border border-gray-300 px-4 py-2">Opmerking</th>
                <th class="border border-gray-300 px-4 py-2">Acties</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            @if(isset($personen) && count($personen) > 0)
                @foreach ($personen as $persoon)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $persoon->voornaam }} {{ $persoon->tussenvoegsel ?? '' }} {{ $persoon->achternaam }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $persoon->contact->email ?? 'Geen email' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $persoon->contact->mobiel ?? 'Geen mobiel' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $persoon->is_volwassen ? 'Ja' : 'Nee' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $persoon->is_active ? 'Ja' : 'Nee' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $persoon->opmerking ?? 'Geen opmerking' }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="{{ route('personen.edit', $persoon->id) }}" class="text-blue-500 hover:text-blue-600">
                            <!-- Heroicons pencil icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 010 2.828l-10 10a2 2 0 01-.878.516l-4 1a1 1 0 01-1.265-1.265l1-4a2 2 0 01.516-.878l10-10a2 2 0 012.828 0zM15.586 4L5.586 14H4v-1.586L14 4h1.586z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="border border-gray-300 px-4 py-2 text-center">
                        @if(request('search_date'))
                            Geen informatie gevonden voor deze datum.
                        @else
                            Geen klanten gevonden.
                        @endif
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
