<x-app-layout>

    <x-slot name="header">
        @include('personal.partials.migas')
        @include('personal.partials.navigation_personal')
    </x-slot>

    <div class="py-12 relative">

        <!-- Formulario edicion de vehiculo -->
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Actualizar Soldado</h1>
                @include('personal.soldiers.form_soldier', ['soldier' => $soldier, 'method' => 'put', 'route' => 'soldiers.update'])
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([0, 0], 2);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var marcador = L.marker([{{ $soldier->weapon->latitude }}, {{ $soldier->weapon->longitude }}]).addTo(map)
                .bindPopup('Coordenadas: {{ $soldier->weapon->latitude }}, {{ $soldier->weapon->longitude }}')
                .openPopup();

            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;


                if (marcador) {
                    map.removeLayer(marcador);
                }

                marcador = L.marker([lat, lng]).addTo(map)
                    .bindPopup('Coordenadas: ' + lat + ', ' + lng)
                    .openPopup();
            });

        });
    </script>

</x-app-layout>
