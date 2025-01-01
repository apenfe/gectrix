<x-app-layout>

    <x-slot name="header">
        @include('alerta-temprana.partials.navigation_alert')
    </x-slot>

    {{-- Vista Blade: show.blade.php o details.blade.php --}}
    <div class="py-12 relative">
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <x-session />
        </div>
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap gap-2 p-6">
                <!-- Botón de Volver -->
                <div class="w-full mb-4">
                    <a href="{{ route('targets.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Volver a la lista de objetivos
                    </a>
                </div>
                <!-- Contenedor principal de la tarjeta -->
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <!-- Columna de información -->
                    <div class="md:w-1/2">
                        <div class="rounded-lg overflow-hidden mb-4">
                            <img src="{{ $target->image != null ? asset('private/targets/'.$target->image) : asset('private/targets/target.png') }}" alt="{{ $target->name }}" class="w-full h-64 object-cover">
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

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap gap-2 p-6 mt-4">
                <!-- Botón de Volver -->
                <div class="w-full mb-4">
                    <a href="{{ route('sat.create', $target) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Obtener imagen satelital
                    </a>
                </div>
                <!-- mostrar los sats del target -->
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full flex gap-2 flex-wrap">
                        @foreach( $target->sats as $sat )
                            <div class="rounded-lg overflow-hidden mb-4">
                                <img src="{{ $sat->image_route }}" alt="{{ $target->name }}" class="w-full object-cover" width="500">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script>
            // Inicializar el mapa cuando el documento esté listo
            document.addEventListener('DOMContentLoaded', function() {
                // Inicializar el mapa
                const map = L.map('map').setView([{{ $target->latitude }}, {{ $target->longitude }}], 9);

                // Agregar el tile layer de OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                // Crear un icono personalizado
                const customIcon = L.icon({
                    iconUrl: '{{ $target->logo != null ? asset('private/targets/'.$target->logo) : asset('private/targets/target.png') }}',
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
