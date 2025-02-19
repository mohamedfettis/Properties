<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @auth
                <div class="mb-4">
                    <a href="{{ route('properties.create') }}" class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-dark">
                        {{ __('Add Property') }}
                    </a>
                </div>
            @endauth

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($properties as $property)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative group hover:shadow-lg transition-all flex flex-col h-full">
                        <div class="aspect-w-16 aspect-h-9 relative overflow-hidden">
                            <img src="{{ $property->main_photo_url }}" 
                                 alt="{{ $property->name }}" 
                                 class="w-full h-[250px] object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="text-lg font-semibold mb-2 group-hover:text-primary transition-colors">{{ $property->name }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $property->description }}</p>
                            <div class="mt-auto flex justify-between items-center mb-4">
                                <p class="text-primary font-bold">{{ number_format($property->price_per_night, 2) }} € / night</p>
                                <span class="text-sm text-gray-500">{{ $property->user->name }}</span>
                            </div>
                            
                            @auth
                                @if (auth()->id() === $property->user_id)
                                    <div class="flex space-x-2">
                                        <a href="{{ route('properties.edit', $property) }}" class="inline-flex items-center px-3 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('properties.destroy', $property) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700" onclick="return confirm('Are you sure?')">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <form action="{{ route('bookings.store', $property) }}" method="POST">
                                        @csrf
                                        <div class="space-y-2">
                                            <div>
                                                <x-input-label for="start_date" :value="__('Check-in')" />
                                                <x-text-input id="start_date" type="date" name="start_date" class="block mt-1 w-full" required />
                                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="end_date" :value="__('Check-out')" />
                                                <x-text-input id="end_date" type="date" name="end_date" class="block mt-1 w-full" required />
                                                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                                            </div>
                                            <x-primary-button>
                                                {{ __('Book Now') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                @endif
                            @else
                                <p class="text-gray-600">
                                    <a href="{{ route('login') }}" class="text-primary hover:underline">Login</a> to book this property
                                </p>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
