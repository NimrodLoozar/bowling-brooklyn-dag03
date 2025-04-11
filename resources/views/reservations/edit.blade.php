<x-layouts.app>
    <x-slot name="title">
        {{ __('Reservering Wijzigen') }}
    </x-slot>

    <h1 class="text-lg font-bold border-b">Reservering Wijzigen</h1>

    @if ($errors->has('lane_number'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            {{ $errors->first('lane_number') }}
        </div>
    @endif

    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mt-4">
            <label for="lane_number">Baannummer:</label>
            <select class="border-black bg-gray-500" name="lane_number" id="lane_number">
                @foreach ($lanes as $lane)
                    <option class="dark:text-black" value="{{ $lane->Nummer }}"
                        {{ $lane->Nummer == $reservation->BaanId ? 'selected' : '' }}>
                        {{ $lane->Nummer }} {{ $lane->HeeftHek ? '(Hekjes voor kinderen)' : '' }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit"
            class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-800">Wijzigen</button>
    </form>
</x-layouts.app>
