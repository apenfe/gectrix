<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Alerts') }}
        </h2>
        @include('alerta-temprana.partials.navigation_alert')
    </x-slot>

    <div class="py-12">
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 gap-6 justify-center">

                @if( $alerts->isEmpty() )
                    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items center">
                            <div class="ml-4 text-lg text-gray-600 dark:text-gray-300 leading-7 font-semibold">No hay alertas</div>
                        </div>
                    </div>
                @else
                    @foreach( $alerts as $alert )
                        @include('alerta-temprana.alerts.alert-card')
                    @endforeach
                @endif
            </div>
        </div>
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 gap-6 justify-center">
                @if( $targets->isEmpty() )
                    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items center">
                            <div class="ml-4 text-lg text-gray-600 dark:text-gray-300 leading-7 font-semibold">No hay Objetivos</div>
                        </div>
                    </div>
                @else
                    @foreach( $targets as $target )
                        @include('alerta-temprana.targets.target-card')
                    @endforeach
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
