<div class="mb-4 w-full">
    <label for="type" class="block text-gray-700 dark:text-gray-300">Tipo de Alerta</label>
    <select id="type" name="type" class="mt-1 block w-full" required>
        <option value="air-strike" {{ old('type', $alert->type ?? '') == 'air-strike' ? 'selected' : '' }}>Air Strike</option>
        <option value="ground-attack" {{ old('type', $alert->type ?? '') == 'ground-attack' ? 'selected' : '' }}>Ground Attack</option>
        <option value="naval-bombardment" {{ old('type', $alert->type ?? '') == 'naval-bombardment' ? 'selected' : '' }}>Naval Bombardment</option>
    </select>
</div>
<div class="mb-4 w-full">
    <label for="start_date" class="block text-gray-700 dark:text-gray-300">Fecha de Inicio</label>
    <input type="datetime-local" id="start_date" name="start_date" class="mt-1 block w-full" value="{{ old('start_date', $alert->start_date ?? '') }}" required>
</div>
<div class="mb-4 w-full">
    <label for="end_date" class="block text-gray-700 dark:text-gray-300">Fecha de Fin</label>
    <input type="datetime-local" id="end_date" name="end_date" class="mt-1 block w-full" value="{{ old('end_date', $alert->end_date ?? '') }}" required>
</div>
<div class="mb-4 w-full">
    <label for="radius" class="block text-gray-700 dark:text-gray-300">Radio de Afectación (km)</label>
    <input type="number" id="radius" name="radius" class="mt-1 block w-full" value="{{ old('radius', $alert->radius ?? '') }}" required>
</div>
<div class="mb-4 w-full">
    <label for="latitude" class="block text-gray-700 dark:text-gray-300">Latitud</label>
    <input type="text" id="latitude" name="latitude" class="mt-1 block w-full" value="{{ old('latitude', $alert->latitude ?? '') }}" required>
</div>
<div class="mb-4 w-full">
    <label for="longitude" class="block text-gray-700 dark:text-gray-300">Longitud</label>
    <input type="text" id="longitude" name="longitude" class="mt-1 block w-full" value="{{ old('longitude', $alert->longitude ?? '') }}" required>
</div>
<div class="mb-4 w-full">
    <label for="description" class="block text-gray-700 dark:text-gray-300">Descripción</label>
    <textarea id="description" name="description" class="mt-1 block w-full" required>{{ old('description', $alert->description ?? '') }}</textarea>
</div>
<div class="mb-4 w-full">
    <label for="danger_level" class="block text-gray-700 dark:text-gray-300">Nivel de Peligro</label>
    <select id="danger_level" name="danger_level" class="mt-1 block w-full" required>
        <option value="low" {{ old('danger_level', $alert->danger_level ?? '') == 'low' ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ old('danger_level', $alert->danger_level ?? '') == 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ old('danger_level', $alert->danger_level ?? '') == 'high' ? 'selected' : '' }}>High</option>
    </select>
</div>
<div id="map" class="h-[400px] rounded-lg"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar el mapa
        const map = L.map('map').setView([{{ $alert->latitude ?? 40.3297957 }}, {{ $alert->longitude ?? -3.6804199 }}], 5);

        // Añadir la capa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Añadir el marcador inicial
        let marker = L.marker([{{ $alert->latitude ?? 0 }}, {{ $alert->longitude ?? 0 }}]).addTo(map);

        // Evento de clic en el mapa
        map.on('click', function(e) {
            const { lat, lng } = e.latlng;

            // Actualizar la posición del marcador
            marker.setLatLng([lat, lng]);

            // Actualizar los campos de latitud y longitud en el formulario
            document.getElementById('latitude').value = lat.toFixed(7);
            document.getElementById('longitude').value = lng.toFixed(7);
        });
    });
</script>
