<x-app-layout>

    <x-slot name="header">
        @include('alerta-temprana.partials.navigation_alert')
        @include('alerta-temprana.partials.header')
    </x-slot>

    {{-- Vista Blade: show.blade.php o details.blade.php --}}
    <div class="py-12 relative">
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap gap-2 p-6">
                <!-- Contenedor principal de la tarjeta -->
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <!-- Columna de información -->
                    <div class="md:w-1/2">
                        <div class="rounded-lg overflow-hidden mb-4">
                            <img src="{{ $target->image != null ? asset('/targets/images/'.$target->image) : asset('/targets/images/target.png') }}" alt="{{ $target->name }}" class="w-full h-64 object-cover">
                        </div>
                        <div class="space-y-4">
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $target->name }}</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Prioridad</p>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $target->priority }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Estado</p>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $target->status }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Fecha de activación</p>
                                    <p class="font-medium text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($target->setup_date)->format('d M, Y') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Fecha de desactivación</p>
                                    <p class="font-medium text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($target->deactivation_date)->format('d M, Y') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Radio de acción</p>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $target->radius }} km</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tipo de Acción</p>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $target->action }}</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-500 dark:text-gray-400">Descripción</p>
                                <p class="text-gray-900 dark:text-white">{{ $target->description }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Columna del mapa -->
                    <div class="md:w-1/2">
                        <div id="map" class="h-[500px] rounded-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script>
            // Inicializar el mapa cuando el documento esté listo
            document.addEventListener('DOMContentLoaded', function() {
                // Inicializar el mapa
                const map = L.map('map').setView([{{ $target->latitude }}, {{ $target->longitude }}], 13);

                // Agregar el tile layer de OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                // Crear un icono personalizado
                const customIcon = L.icon({
                    iconUrl: '{{ $target->logo != null ? asset('/targets/logos/'.$target->logo) : asset('/targets/logos/target.png') }}',
                    iconSize: [32, 32],
                    iconAnchor: [16, 32],
                    popupAnchor: [0, -32]
                });

                // Añadir el marcador con el icono personalizado
                const marker = L.marker([{{ $target->latitude }}, {{ $target->longitude }}], {
                    icon: customIcon
                }).addTo(map);

                // Añadir el círculo para el radio de acción
                const circle = L.circle([{{ $target->latitude }}, {{ $target->longitude }}], {
                    radius: {{ $target->radius * 1000 }}, // Convertir km a metros
                    color: '#3388ff',
                    fillColor: '#3388ff',
                    fillOpacity: 0.2
                }).addTo(map);

                // Añadir popup al marcador
                marker.bindPopup(`<b>{{ $target->name }}</b><br>Prioridad: {{ $target->priority }}`);
            });
        </script>

</x-app-layout>
