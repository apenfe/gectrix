<x-app-layout>

    <x-slot name="header">
        @include('alerta-temprana.partials.navigation_alert')
        @include('alerta-temprana.partials.header')
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap gap-2 p-6">

            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap gap-2 p-6">

            </div>
        </div>
    </div>

</x-app-layout>
