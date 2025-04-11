@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Klant Details</h1>

    <form method="POST" action="{{ route('personen.update', $persoon->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="flex items-center">
            <label for="voornaam" class="w-1/4 text-sm font-medium text-gray-700">Voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" value="{{ $persoon->voornaam }}" class="border border-gray-300 rounded px-4 py-2 w-3/4">
        </div>

        <div class="flex items-center">
            <label for="tussenvoegsel" class="w-1/4 text-sm font-medium text-gray-700">Tussenvoegsel:</label>
            <input type="text" id="tussenvoegsel" name="tussenvoegsel" value="{{ $persoon->tussenvoegsel ?? '' }}" class="border border-gray-300 rounded px-4 py-2 w-3/4">
        </div>

        <div class="flex items-center">
            <label for="achternaam" class="w-1/4 text-sm font-medium text-gray-700">Achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" value="{{ $persoon->achternaam }}" class="border border-gray-300 rounded px-4 py-2 w-3/4">
        </div>

        <div class="flex items-center">
            <label for="mobiel" class="w-1/4 text-sm font-medium text-gray-700">Mobiel:</label>
            <input type="text" id="mobiel" name="mobiel" value="{{ $persoon->contact->mobiel ?? '' }}" class="border border-gray-300 rounded px-4 py-2 w-3/4">
        </div>

        <div class="flex items-center">
            <label for="email" class="w-1/4 text-sm font-medium text-gray-700">E-mail:</label>
            <input type="email" id="email" name="email" value="{{ $persoon->contact->email ?? '' }}" class="border border-gray-300 rounded px-4 py-2 w-3/4">
        </div>

        <div class="flex items-center">
            <label for="is_volwassen" class="w-1/4 text-sm font-medium text-gray-700">Volwassen:</label>
            <input type="checkbox" id="is_volwassen" name="is_volwassen" {{ $persoon->is_volwassen ? 'checked' : '' }} class="h-5 w-5">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Wijzigen</button>
        </div>
    </form>
</div>
@endsection
