<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Personal') }}
        </h2>

        <!-- crear botones para ir a armas, vehiculos, soldados, mandos y brigadas -->
        <div class="flex justify-center">
            <a href="{{ route('personal.weapons') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Weapons') }}</a>
            <a href="{{ route('personal.vehicles') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Vehicles') }}</a>
            <a href="{{ route('personal.soldiers') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Soldiers') }}</a>
            <a href="{{ route('personal.commanders') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Commanders') }}</a>
            <a href="{{ route('personal.brigades') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Brigades') }}</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                {{-- Sección para mostrar las weapons --}}
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Weapons') }}</h3>
                    <ul>
                        @foreach ($weapons as $weapon)
                            <li>{{ $weapon->brand }}</li>
                        @endforeach
                    </ul>
                </div>

                {{-- Sección para mostrar los soldiers --}}
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Soldiers') }}</h3>
                    <ul>
                        @foreach ($soldiers as $soldier)
                            <li>{{ $soldier->name }}</li>
                        @endforeach
                    </ul>
                </div>

                {{-- Sección para mostrar los commanders --}}
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Commanders') }}</h3>
                    <ul>
                        @foreach ($commanders as $commander)
                            <li>{{ $commander->name }}</li>
                        @endforeach
                    </ul>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
