<x-layouts.app>
    <x-slot name="title">
        {{ __('Reservations') }}
    </x-slot>

    <h1>{{ __('Reservations') }}</h1>

    <div class="mb-4">
        <a href="{{ route('reservations.create') }}" class="btn btn-primary">{{ __('Create Reservation') }}</a>
    </div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <table class="min-w-full table-auto">
            <thead class="">
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
            <tbody class="text-gray-800 text-sm font-light
            {{-- bg-white dark:bg-transparent dark:text-neutral-200 text-center --}}
            ">
                @foreach ($reservations as $reservation)
                    <tr class="border-b border-red-500 text-center hover:bg-gray-50">
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->roepnaam }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->datum }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->aantaluren }}
                        </td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->begintijd }}
                        </td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">{{ $reservation->eindtijd }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">
                            {{ $reservation->aantalvolwassenen }}</td>
                        <td class="py-3 px-6 whitespace-nowrap font-medium">
                            {{ $reservation->aantalkinderen }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
