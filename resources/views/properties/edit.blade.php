<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Property') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('properties.update', $property) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="space-y-4">
                            <div>
                                <x-input-label for="name" :value="__('Property Name')" />
                                <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" :value="old('name', $property->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" rows="4" required>{{ old('description', $property->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="price_per_night" :value="__('Price per Night')" />
                                <x-text-input id="price_per_night" name="price_per_night" type="number" step="0.01" class="block mt-1 w-full" :value="old('price_per_night', $property->price_per_night)" required />
                                <x-input-error :messages="$errors->get('price_per_night')" class="mt-2" />
                            </div>

                            <!-- Current Photos Preview -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900">{{ __('Current Photos') }}</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500 mb-2">Main Photo</p>
                                        <img src="{{ $property->main_photo_url }}" alt="Main Photo" class="w-full h-48 object-cover rounded-lg">
                                    </div>
                                    @if($property->secondary_photo_1)
                                        <div>
                                            <p class="text-sm text-gray-500 mb-2">Secondary Photo 1</p>
                                            <img src="{{ $property->secondary_photo_1_url }}" alt="Secondary Photo 1" class="w-full h-48 object-cover rounded-lg">
                                        </div>
                                    @endif
                                    @if($property->secondary_photo_2)
                                        <div>
                                            <p class="text-sm text-gray-500 mb-2">Secondary Photo 2</p>
                                            <img src="{{ $property->secondary_photo_2_url }}" alt="Secondary Photo 2" class="w-full h-48 object-cover rounded-lg">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Update Photos -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900">{{ __('Update Photos') }}</h3>
                                
                                <div>
                                    <x-input-label for="main_photo" :value="__('New Main Photo')" />
                                    <input type="file" id="main_photo" name="main_photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-600" />
                                    <x-input-error :messages="$errors->get('main_photo')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="secondary_photo_1" :value="__('New Secondary Photo 1')" />
                                    <input type="file" id="secondary_photo_1" name="secondary_photo_1" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-600" />
                                    <x-input-error :messages="$errors->get('secondary_photo_1')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="secondary_photo_2" :value="__('New Secondary Photo 2')" />
                                    <input type="file" id="secondary_photo_2" name="secondary_photo_2" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-600" />
                                    <x-input-error :messages="$errors->get('secondary_photo_2')" class="mt-2" />
                                </div>

                            <div class="flex items-center justify-end">
                                <x-primary-button>
                                    {{ __('Update Property') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
