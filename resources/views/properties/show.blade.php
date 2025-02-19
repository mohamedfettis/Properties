<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $property->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Photos Gallery -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Main Photo -->
                        <div class="col-span-1 md:col-span-2">
                            <img src="{{ $property->main_photo_url }}" alt="{{ $property->name }}" class="w-full h-96 object-cover rounded-lg">
                        </div>
                        
                        <!-- Secondary Photos -->
                        @if($property->secondary_photo_1 || $property->secondary_photo_2)
                            <div class="grid grid-cols-2 gap-4">
                                @if($property->secondary_photo_1)
                                    <img src="{{ $property->secondary_photo_1_url }}" alt="{{ $property->name }} - Photo 2" class="w-full h-48 object-cover rounded-lg">
                                @endif
                                @if($property->secondary_photo_2)
                                    <img src="{{ $property->secondary_photo_2_url }}" alt="{{ $property->name }} - Photo 3" class="w-full h-48 object-cover rounded-lg">
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Property Details -->
                    <div class="space-y-4">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $property->name }}</h1>
                        
                        <div class="flex items-center text-gray-500">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>{{ $property->user->name }}</span>
                        </div>

                        <div class="flex items-center text-gray-500">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 10c0 1.105-2.686 2-6 2s-6-.895-6-2M19 14c0 1.105-2.686 2-6 2s-6-.895-6-2M19 18c0 1.105-2.686 2-6 2s-6-.895-6-2" />
                            </svg>
                            <span>{{ number_format($property->price_per_night, 2) }} € / nuit</span>
                        </div>

                        <p class="text-gray-600 mt-4">{{ $property->description }}</p>

                        @can('update', $property)
                            <div class="flex space-x-4 mt-6">
                                <a href="{{ route('properties.edit', $property) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                    {{ __('Edit Property') }}
                                </a>
                                
                                <form method="POST" action="{{ route('properties.destroy', $property) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500" onclick="return confirm('Are you sure you want to delete this property?')">
                                        {{ __('Delete Property') }}
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
