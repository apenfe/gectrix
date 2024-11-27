<x-app-layout>

    <x-slot name="header">
        @include('personal.partials.migas')
        @include('personal.partials.navigation_personal')
    </x-slot>

    <div class="py-12 relative">

        <!-- Formulario creacion de arma -->
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Crear nueva arma</h1>
                @include('personal.weapons.form_weapon', ['weapon' => null, 'method' => 'post', 'route' => 'weapons.store'])
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([0, 0], 2);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var marcador;

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
