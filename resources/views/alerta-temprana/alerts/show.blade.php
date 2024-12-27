<x-app-layout>

    <x-slot name="header">
        @include('alerta-temprana.partials.navigation_alert')
        @include('alerta-temprana.partials.header')
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap gap-2 p-6">
                <!-- Columna de información -->
                <div class="w-full md:w-1/2 space-y-4">
                    <!-- Tipo de Alerta -->
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Tipo de Alerta</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $alert->type }}</p>
                    </div>

                    <!-- Nivel de Peligro -->
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Nivel de Peligro</h3>
                        <div class="flex items-center">
                            @php
                                $dangerClasses = [
                                    'low' => 'bg-green-500',
                                    'medium' => 'bg-orange-500',
                                    'high' => 'bg-red-500',
                                ];
                            @endphp
                            <span class="px-3 py-1 rounded-full text-white {{ $dangerClasses[$alert->danger_level] ?? 'bg-gray-500' }}">
                            Nivel {{ $alert->danger_level }}
                        </span>
                        </div>
                    </div>

                    <!-- Fecha y Hora -->
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Periodo de Alerta</h3>
                        <div class="space-y-2">
                            <p class="text-gray-600 dark:text-gray-400">
                                <span class="font-medium">Inicio:</span>
                                {{ $alert->start_date->format('d/m/Y H:i') }}
                            </p>
                            <p class="text-gray-600 dark:text-gray-400">
                                <span class="font-medium">Fin:</span>
                                {{ $alert->end_date->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>

                    <!-- Radio -->
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Radio de Afectación</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $alert->radius }} km</p>
                    </div>

                    <!-- Descripción -->
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Descripción</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $alert->description }}</p>
                    </div>
                </div>

                <!-- Columna del mapa -->
                <div class="w-full md:w-1/2">
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 h-full">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Ubicación</h3>
                        <div id="map" class="h-[400px] rounded-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts para el mapa -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inicializar el mapa
                const map = L.map('map').setView([{{ $alert->latitude }}, {{ $alert->longitude }}], 13);

                // Añadir la capa de OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                // Añadir el marcador
                const marker = L.marker([{{ $alert->latitude }}, {{ $alert->longitude }}]).addTo(map);

                // Añadir el círculo del radio de afectación
                const circle = L.circle([{{ $alert->latitude }}, {{ $alert->longitude }}], {
                    color: '{{ $dangerClasses[$alert->danger_level] ?? "#374151" }}',
                    fillColor: '{{ $dangerClasses[$alert->danger_level] ?? "#374151" }}',
                    fillOpacity: 0.2,
                    radius: {{ $alert->radius * 1000 }} // Convertir km a metros
                }).addTo(map);

                // Ajustar la vista para mostrar todo el círculo
                map.fitBounds(circle.getBounds());
            });
        </script>

</x-app-layout>
