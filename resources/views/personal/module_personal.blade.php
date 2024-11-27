<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Personal') }}
        </h2>

        <!-- crear botones para ir a armas, vehículos, soldados, mandos y brigadas -->
        <div class="flex justify-center gap-2">
            <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                <a href="{{ route('personal.weapons') }}">{{ __('Weapons') }}</a>
            </x-button>
            <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                <a href="{{ route('personal.vehicles') }}">{{ __('Vehicles') }}</a>
            </x-button>
            <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                <a href="{{ route('personal.soldiers') }}">{{ __('Soldiers') }}</a>
            </x-button>
            <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                <a href="{{ route('personal.commanders') }}">{{ __('Commanders') }}</a>
            </x-button>
            <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                <a href="{{ route('personal.brigades') }}">{{ __('Brigades') }}</a>
            </x-button>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex flex-row gap-3">
                    @include('personal.partials.resume_brigade')
                </div>

                <div class="flex flex-row gap-3">
                    @include('personal.partials.resume_commanders')
                    @include('personal.partials.resume_soldiers')
                </div>

                <div class="flex flex-row gap-3">
                    @include('personal.partials.resume_vehicles')
                    @include('personal.partials.resume_weapons')
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
