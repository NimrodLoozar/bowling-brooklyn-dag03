<x-layouts.app>
    <h1>Reservering Wijzigen</h1>

    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="lane_number">Baannummer:</label>
            <select name="lane_number" id="lane_number">
                @foreach ($lanes as $lane)
                    <option value="{{ $lane['number'] }}"
                        {{ $lane['number'] == $reservation->BaanId ? 'selected' : '' }}>
                        {{ $lane['number'] }} {{ $lane['is_kids_friendly'] ? '(Hekjes voor kinderen)' : '' }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Wijzigen</button>
    </form>
</x-layouts.app>
