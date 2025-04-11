<x-layouts.app>
    <x-slot name="title">
        {{ __('Reserveringen Wijzigen') }}
    </x-slot>

    <h1>{{ __('Reserveringen Wijzigen') }}</h1>

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <table class="min-w-full table-auto">
            <thead>
                <tr
                    class="bg-gray-100 text-gray-800 dark:bg-transparent dark:text-white uppercase text-sm font-medium leading-normal">
                    <th class="py-4 px-6">{{ __('Naam') }}</th>
                    <th class="py-4 px-6">{{ __('Datum') }}</th>
                    <th class="py-4 px-6">{{ __('Volwassenen') }}</th>
                    <th class="py-4 px-6">{{ __('Kinderen') }}</th>
                    <th class="py-4 px-6">{{ __('Baan') }}</th>
                    <th class="py-4 px-6">{{ __('Wijzigen') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 dark:text-white text-sm font-light bg-transparent">
                @foreach ($reservations as $reservation)
                    <tr class="border-b border-red-500 text-center">
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->roepnaam }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->datum }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->volwassenen }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->kinderen }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->baan }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">
                            <a href="{{ route('reservations.edit', $reservation->id) }}"
                                class="text-blue-500 hover:underline">
                                {{ __('Wijzigen') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="min-h-screen bg-gray-900 text-white p-6">
        <h1 class="text-3xl font-bold mb-6">Reservation Details #{{ $reservation->id }}</h1>

        <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Reservation Information</h2>
                    <div class="space-y-2">
                        <p><span class="font-medium">Reservation Number:</span> {{ $reservation->Reserveringsnummer }}
                        </p>
                        <p><span class="font-medium">Date:</span> {{ $reservation->Datum }}</p>
                        <p><span class="font-medium">Time:</span> {{ $reservation->BeginTijd }} -
                            {{ $reservation->EindTijd }}</p>
                        <p><span class="font-medium">Duration:</span> {{ $reservation->AantalUren }} hours</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold mb-4">Guest Information</h2>
                    <div class="space-y-2">
                        <p><span class="font-medium">Adults:</span> {{ $reservation->AantalVolwassen }}</p>
                        <p><span class="font-medium">Children:</span> {{ $reservation->AantalKinderen ?? '0' }}</p>
                        <p><span class="font-medium">Package Option:</span>
                            @if ($reservation->packageOption)
                                {{ $reservation->packageOption->Naam }}
                            @else
                                None selected
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('reservations.edit', $reservation) }}"
                    class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold px-4 py-2 rounded mr-2">
                    Edit
                </a>
                <a href="{{ route('reservations.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded">
                    Back to List
                </a>
            </div>
        </div>
    </div> --}}
</x-layouts.app>
