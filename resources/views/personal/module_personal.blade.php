<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Personal') }}
        </h2>

        <!-- crear botones para ir a armas, vehiculos, soldados, mandos y brigadas -->
        <div class="flex justify-center">
            <a href="{{ route('personal.weapons') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Weapons') }}</a>
            <a href="{{ route('personal.vehiculos') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Vehiculos</a>
            <a href="{{ route('personal.soldados') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Soldados</a>
            <a href="{{ route('personal.mandos') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Mandos</a>
            <a href="{{ route('personal.brigadas') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Brigadas</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

            </div>
        </div>
    </div>

</x-app-layout>
