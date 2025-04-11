<x-layouts.app>
    <x-slot name="title">
        {{ __('Reservations') }}
    </x-slot>

    <h1>{{ __('Reservations') }}</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->has('selectedDate'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            {{ $errors->first('selectedDate') }}
        </div>
    @endif

    <div class="mb-4 flex justify-between items-center">
        <form method="GET" action="{{ route('reservations.index') }}" class="flex items-center gap-4">
            <input type="date" name="selectedDate" value="{{ $selectedDate }}"
                class="form-input hover:border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm" />

            <button type="submit"
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-800">
                {{ __('Toon reserveringen') }}
            </button>
        </form>
        <a href="{{ route('reservations.show') }}">
            <button type="button"
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-800">
                {{ __('Wijzigen') }}
            </button>
        </a>
    </div>

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-800 uppercase text-sm font-medium leading-normal">
                    <th class="py-4 px-6">{{ __('Naam') }}</th>
                    <th class="py-4 px-6">{{ __('Datum') }}</th>
                    <th class="py-4 px-6">{{ __('Aantal uren') }}</th>
                    <th class="py-4 px-6">{{ __('Begintijd') }}</th>
                    <th class="py-4 px-6">{{ __('Eindtijd') }}</th>
                    <th class="py-4 px-6">{{ __('Aantal volwassenen') }}</th>
                    <th class="py-4 px-6">{{ __('Aantal kinderen') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 text-sm font-light">
                @foreach ($reservations as $reservation)
                    <tr class="border-b border-red-500 text-center hover:bg-gray-50">
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->roepnaam }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->datum }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->aantaluren }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->begintijd }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->eindtijd }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->aantalvolwassenen }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->aantalkinderen }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
