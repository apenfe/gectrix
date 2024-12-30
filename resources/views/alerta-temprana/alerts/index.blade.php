<x-app-layout>
    <x-slot name="header">
        @include('alerta-temprana.partials.navigation_alert')
{{--        @include('alerta-temprana.partials.header')--}}
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 justify-center mb-4">
            @include('alerta-temprana.partials.filter-alert')
        </div>
    </x-slot>

    <div class="py-12 relative">
        <x-create-new route="alerts.create"></x-create-new>
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <x-session />
        </div>
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap gap-4 p-6 justify-center">
                @foreach( $alerts as $alert )
                    @include('alerta-temprana.alerts.alert-card')
                @endforeach
            </div>
            <div class="mt-5">
                {{ $alerts->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
