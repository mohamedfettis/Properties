<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('My Active Bookings') }}</h3>
                        <a href="{{ route('bookings.active') }}" class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-dark transition-colors">
                            {{ __('View All Bookings') }}
                        </a>
                    </div>

                    @if($activeBookings->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($activeBookings as $booking)
                                <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition-shadow p-4">
                                    <div class="aspect-w-16 aspect-h-9 mb-4">
                                        <img src="{{ $booking->property->main_photo_url }}" alt="{{ $booking->property->name }}" class="w-full h-48 object-cover rounded-lg">
                                    </div>
                                    <h4 class="font-semibold text-lg mb-2">{{ $booking->property->name }}</h4>
                                    <div class="space-y-2 text-sm text-gray-600">
                                        <p>
                                            <span class="font-medium">Check-in:</span> 
                                            {{ $booking->start_date->format('d M Y') }}
                                        </p>
                                        <p>
                                            <span class="font-medium">Check-out:</span> 
                                            {{ $booking->end_date->format('d M Y') }}
                                        </p>
                                        <p class="text-lg">
                                            <span class="font-medium">Total:</span> 
                                            <span class="font-bold text-primary">{{ number_format($booking->total_price, 2) }} €</span>
                                        </p>
                                        <form method="POST" action="{{ route('bookings.destroy', $booking) }}" class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')" 
                                                class="w-full px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition-colors">
                                                {{ __('Annuler la réservation') }}
                                            </button>
                                        </form>
                                        <p class="text-primary">
                                            @if($booking->days_until_check_in > 0)
                                                {{ $booking->days_until_check_in }} days until check-in
                                            @else
                                                Check-in is today!
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-600">{{ __('You have no active bookings.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
