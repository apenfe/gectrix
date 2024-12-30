<x-app-layout>

    <x-slot name="header">
        @include('alerta-temprana.partials.navigation_alert')
        @include('alerta-temprana.partials.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 justify-center mb-4">
            <div id="map" class="w-full h-96"></div>
        </div>

        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 gap-6 justify-center">

                @if( $alerts->isEmpty() )
                    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items center">
                            <div class="ml-4 text-lg text-gray-600 dark:text-gray-300 leading-7 font-semibold">No hay alertas</div>
                        </div>
                    </div>
                @else
                    @foreach( $alerts->take(3) as $alert )
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
                    @foreach( $targets->take(3) as $target )
                        @include('alerta-temprana.targets.target-card')
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <script>
        // script para cargar el mapa de leaflet donde se muestran los targets y alertas con su radio de accion
        var map = L.map('map').setView([{{ $alerts->first()->latitude }}, {{ $alerts->first()->longitude }}], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        @foreach( $targets as $target )
            L.circle([{{ $target->latitude }}, {{ $target->longitude }}], {
                color: 'red',
                fillColor: '#00c4ff',
                fillOpacity: 0.5,
                radius: {{ $target->radius*1000 }}
            }).addTo(map).bindPopup("Objetivo: {{ $target->name }}");
        @endforeach

            // si la alerta esta terminada poner en gris
        @foreach( $alerts as $alert )
            L.circle([{{ $alert->latitude }}, {{ $alert->longitude }}], {
                color: '{{ $alert->end_date <= now() ? "gray" : "blue" }}',
                fillColor: '{{ $alert->end_date <= now() ? "gray" : "#00c4ff" }}',
                fillOpacity: 0.5,
                radius: {{ $alert->radius*1000 }}
            }).addTo(map).bindPopup("Alerta: {{ $alert->name }}");
        @endforeach

        // agregar popup a cada target y alerta
        @foreach( $targets as $target )
            L.marker([{{ $target->latitude }}, {{ $target->longitude }}]).addTo(map)
                .bindPopup("Objetivo: {{ $target->name }}");
        @endforeach

        @foreach( $alerts as $alert )
            L.marker([{{ $alert->latitude }}, {{ $alert->longitude }}]).addTo(map)
            .bindPopup("Alerta: {{ $alert->type }}<br>Latitud: {{ $alert->latitude }}<br>Longitud: {{ $alert->longitude }}<br>Radio: {{ $alert->radius }}<br>Descripción: {{ $alert->description }} <br>Danger Level: {{ $alert->danger_level }} <br><a href='{{ route('alerts.show', $alert->id) }}'>Ver detalles</a>");
        @endforeach


    </script>

</x-app-layout>
