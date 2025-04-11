<x-layouts.app>
    <h1>Reservering Wijzigen</h1>

    @if ($errors->has('lane_number'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            {{ $errors->first('lane_number') }}
        </div>
    @endif

    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="lane_number">Baannummer:</label>
            <select name="lane_number" id="lane_number">
                @foreach ($lanes as $lane)
                    <option value="{{ $lane->Nummer }}" {{ $lane->Nummer == $reservation->BaanId ? 'selected' : '' }}>
                        {{ $lane->Nummer }} {{ $lane->HeeftHek ? '(Hekjes voor kinderen)' : '' }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Wijzigen</button>
    </form>
</x-layouts.app>
