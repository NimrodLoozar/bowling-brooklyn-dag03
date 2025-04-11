<x-layouts.app>
    <div class="min-h-screen bg-gray-900 text-white p-6">
        <h1 class="text-3xl font-bold mb-6">Reservation Details #{{ $reservation->id }}</h1>
        
        <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Reservation Information</h2>
                    <div class="space-y-2">
                        <p><span class="font-medium">Reservation Number:</span> {{ $reservation->Reserveringsnummer }}</p>
                        <p><span class="font-medium">Date:</span> {{ $reservation->Datum }}</p>
                        <p><span class="font-medium">Time:</span> {{ $reservation->BeginTijd }} - {{ $reservation->EindTijd }}</p>
                        <p><span class="font-medium">Duration:</span> {{ $reservation->AantalUren }} hours</p>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-xl font-semibold mb-4">Guest Information</h2>
                    <div class="space-y-2">
                        <p><span class="font-medium">Adults:</span> {{ $reservation->AantalVolwassen }}</p>
                        <p><span class="font-medium">Children:</span> {{ $reservation->AantalKinderen ?? '0' }}</p>
                        <p><span class="font-medium">Package Option:</span> 
                            @if($reservation->packageOption)
                                {{ $reservation->packageOption->Naam }}
                            @else
                                None selected
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="mt-6">
                <a href="{{ route('reservations.edit', $reservation) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold px-4 py-2 rounded mr-2">
                    Edit
                </a>
                <a href="{{ route('reservations.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded">
                    Back to List
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>