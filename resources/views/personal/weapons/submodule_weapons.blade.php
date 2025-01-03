<x-app-layout>

    <x-slot name="header">
        @include('personal.partials.navigation_personal')
        @include('personal.weapons.filter-form')
    </x-slot>

    <div class="py-12 relative">

        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 justify-center mb-4">
            <div id="map1" class="w-full h-96"></div>
        </div>

        @include('personal.partials.create_new', ['route' => 'weapons.create'])
        @include('personal.partials.session')

        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap gap-2 p-6">
                @foreach($weapons as $weapon)
                  @include('personal.weapons.card_weapon')
                @endforeach
            </div>
        </div>

        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            {{ $weapons->links() }}
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // script para cargar el mapa de leaflet donde se muestran los targets y alertas con su radio de accion
            var map = L.map('map1').setView([40.4168, -3.7038], 5);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 20,
            }).addTo(map);

            @foreach( $weapons as $weapon )
                L.circle([{{ $weapon->latitude }}, {{ $weapon->longitude }}], {
                    color: 'blue',
                    fillColor: '#00c4ff',
                    fillOpacity: 0.5,
                    radius: {{ $weapon->maxRange }}
                }).addTo(map).bindPopup("Objetivo: {{ $weapon->name }}");

                L.marker([{{ $weapon->latitude }}, {{ $weapon->longitude }}]).addTo(map)
                    .bindPopup(`@include('personal.weapons.card_weapon')`);
            @endforeach

        });
    </script>
</x-app-layout>
