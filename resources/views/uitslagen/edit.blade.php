@extends('layouts.app')

@section('content')
<h1>Uitslag Bewerken</h1>
<form method="POST" action="{{ route('uitslagen.update', $uitslag->id) }}">
    @csrf
    <label for="aantalpunten">Aantal Punten:</label>
    <input type="number" name="aantalpunten" id="aantalpunten" value="{{ $uitslag->aantalpunten }}" required>
    <button type="submit">Opslaan</button>
</form>
@endsection
