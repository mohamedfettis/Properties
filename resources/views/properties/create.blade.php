<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Property') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="space-y-4">
                            <div>
                                <x-input-label for="name" :value="__('Property Name')" />
                                <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" rows="4" required>{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="price_per_night" :value="__('Price per Night')" />
                                <x-text-input id="price_per_night" name="price_per_night" type="number" step="0.01" class="block mt-1 w-full" :value="old('price_per_night')" required />
                                <x-input-error :messages="$errors->get('price_per_night')" class="mt-2" />
                            </div>

                            <!-- Photos Section -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900">{{ __('Photos') }}</h3>
                                
                                <div>
                                    <x-input-label for="main_photo" :value="__('Photo Principale')" />
                                    <input type="file" id="main_photo" name="main_photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-600" required />
                                    <x-input-error :messages="$errors->get('main_photo')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="secondary_photo_1" :value="__('Photo Secondaire 1')" />
                                    <input type="file" id="secondary_photo_1" name="secondary_photo_1" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-600" />
                                    <x-input-error :messages="$errors->get('secondary_photo_1')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="secondary_photo_2" :value="__('Photo Secondaire 2')" />
                                    <input type="file" id="secondary_photo_2" name="secondary_photo_2" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-600" />
                                    <x-input-error :messages="$errors->get('secondary_photo_2')" class="mt-2" />
                                </div>

                            <div class="flex items-center justify-end">
                                <x-primary-button>
                                    {{ __('Add Property') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
