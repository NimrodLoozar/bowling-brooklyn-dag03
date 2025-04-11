<x-layouts.app>
    <x-slot name="title">
        {{ __('Reserveringen Wijzigen') }}
    </x-slot>

    <h1>{{ __('Reserveringen Wijzigen') }}</h1>

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-800 uppercase text-sm font-medium leading-normal">
                    <th class="py-4 px-6">{{ __('Naam') }}</th>
                    <th class="py-4 px-6">{{ __('Datum') }}</th>
                    <th class="py-4 px-6">{{ __('Volwassenen') }}</th>
                    <th class="py-4 px-6">{{ __('Kinderen') }}</th>
                    <th class="py-4 px-6">{{ __('Baan') }}</th>
                    <th class="py-4 px-6">{{ __('Wijzigen') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 text-sm font-light">
                @foreach ($reservations as $reservation)
                    <tr class="border-b border-red-500 text-center hover:bg-gray-50">
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
</x-layouts.app>
