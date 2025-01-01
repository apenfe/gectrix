<div class="mb-4 w-full">
    <label for="satellite" class="block text-gray-700 dark:text-gray-300">Prioridad</label>
    <select id="satellite" name="satellite" class="mt-1 block w-full" >
        <option value="sentinel1" {{ old('satellite', $sat->satellite ?? '') == 'sentinel1' ? 'selected' : '' }}>Sentinel 1</option>
        <option value="sentinel2" {{ old('satellite', $sat->satellite ?? '') == 'sentinel2' ? 'selected' : '' }}>Sentinel 2</option>
    </select>
    @error('satellite')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="date" class="block text-gray-700 dark:text-gray-300">Fecha de inicio</label>
    <input type="date" id="date" name="date" class="mt-1 block w-full" value="{{ old('date', $sat->date ?? '') }}" >
    @error('date')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
{{--porcentaje nubes--}}
<div class="mb-4 w-full">
    <label for="cloud_coverage" class="block text-gray-700 dark:text-gray-300">Porcentaje de nubes</label>
    <input type="number" id="cloud_coverage" name="cloud_coverage" class="mt-1 block w-full" value="{{ old('cloud_coverage', $sat->cloud_coverage ?? '') }}" >
    @error('cloud_coverage')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
{{--latitud norte--}}
<div class="mb-4 w-full">
    <label for="latitude_north" class="block text-gray-700 dark:text-gray-300">Latitud Norte</label>
    <input type="text" id="latitude_north" name="latitude_north" class="mt-1 block w-full" value="{{ old('latitude_north', $sat->latitude_north ?? '') }}" >
    @error('latitude_north')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
{{--longitud este--}}
<div class="mb-4 w-full">
    <label for="longitude_east" class="block text-gray-700 dark:text-gray-300">Longitud Este</label>
    <input type="text" id="longitude_east" name="longitude_east" class="mt-1 block w-full" value="{{ old('longitude_east', $sat->longitude_east ?? '') }}" >
    @error('longitude_east')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
{{--latitud sur--}}
<div class="mb-4 w-full">
    <label for="latitude_south" class="block text-gray-700 dark:text-gray-300">Latitud Sur</label>
    <input type="text" id="latitude_south" name="latitude_south" class="mt-1 block w-full" value="{{ old('latitude_south', $sat->latitude_south ?? '') }}" >
    @error('latitude_south')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
{{--longitud oeste--}}
<div class="mb-4 w-full">
    <label for="longitude_west" class="block text-gray-700 dark:text-gray-300">Longitud Oeste</label>
    <input type="text" id="longitude_west" name="longitude_west" class="mt-1 block w-full" value="{{ old('longitude_west', $sat->longitude_west ?? '') }}" >
    @error('longitude_west')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div id="map" class="h-[400px] rounded-lg"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar el mapa
        const map = L.map('map').setView([{{ $sat->latitude_north ?? 40.3716589 }}, {{ $sat->longitude_west ?? -3.6859131 }}], 5);

        // Añadir la capa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Inicializar la capa de dibujo
        const drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        // Configurar las opciones de dibujo
        const drawControl = new L.Control.Draw({
            draw: {
                polyline: false,
                polygon: true,
                circle: false,
                rectangle: false,
                marker: false,
                circlemarker: false
            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl);

        // Manejar el evento de creación de un polígono
        map.on(L.Draw.Event.CREATED, function(event) {
            const layer = event.layer;
            drawnItems.addLayer(layer);

            // Obtener las coordenadas del polígono
            const coordinates = layer.getLatLngs()[0];
            const latitudes = coordinates.map(coord => coord.lat);
            const longitudes = coordinates.map(coord => coord.lng);

            // Calcular los valores de latitud norte, latitud sur, longitud este y longitud oeste
            const latitudeNorth = Math.max(...latitudes).toFixed(7);
            const latitudeSouth = Math.min(...latitudes).toFixed(7);
            const longitudeEast = Math.max(...longitudes).toFixed(7);
            const longitudeWest = Math.min(...longitudes).toFixed(7);

            // Actualizar los campos del formulario
            document.getElementById('latitude_north').value = latitudeNorth;
            document.getElementById('latitude_south').value = latitudeSouth;
            document.getElementById('longitude_east').value = longitudeEast;
            document.getElementById('longitude_west').value = longitudeWest;
        });
    });
</script>
