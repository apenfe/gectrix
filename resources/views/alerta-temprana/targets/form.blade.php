<div class="mb-4 w-full">
    <label for="priority" class="block text-gray-700 dark:text-gray-300">Prioridad</label>
    <select id="priority" name="priority" class="mt-1 block w-full" >
        <option value="low" {{ old('priority', $target->priority ?? '') == 'low' ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ old('priority', $target->priority ?? '') == 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ old('priority', $target->priority ?? '') == 'high' ? 'selected' : '' }}>High</option>
    </select>
    @error('priority')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="status" class="block text-gray-700 dark:text-gray-300">Estado</label>
    <input type="hidden" name="status" value="0">
    <input type="checkbox" id="status" name="status" class="mt-1 block" value="1" {{ old('status', $target->status ?? true) ? 'checked' : '' }}>
    @error('status')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="name" class="block text-gray-700 dark:text-gray-300">Nombre</label>
    <input type="text" id="name" name="name" class="mt-1 block w-full" value="{{ old('name', $target->name ?? '') }}" >
    @error('name')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="description" class="block text-gray-700 dark:text-gray-300">Descripción</label>
    <textarea id="description" name="description" class="mt-1 block w-full" >{{ old('description', $target->description ?? '') }}</textarea>
    @error('description')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="latitude" class="block text-gray-700 dark:text-gray-300">Latitud</label>
    <input type="text" id="latitude" name="latitude" class="mt-1 block w-full" value="{{ old('latitude', $target->latitude ?? '') }}" >
    @error('latitude')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="longitude" class="block text-gray-700 dark:text-gray-300">Longitud</label>
    <input type="text" id="longitude" name="longitude" class="mt-1 block w-full" value="{{ old('longitude', $target->longitude ?? '') }}" >
    @error('longitude')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="radius" class="block text-gray-700 dark:text-gray-300">Radio de Afectación (km)</label>
    <input type="number" id="radius" name="radius" class="mt-1 block w-full" value="{{ old('radius', $target->radius ?? '') }}" >
    @error('radius')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="image" class="block text-gray-700 dark:text-gray-300">Imagen</label>
    <input type="file" id="image" name="image" class="mt-1 block w-full">
    @error('image')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="logo" class="block text-gray-700 dark:text-gray-300">Logo</label>
    <input type="file" id="logo" name="logo" class="mt-1 block w-full">
    @error('logo')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="setup_date" class="block text-gray-700 dark:text-gray-300">Fecha de Configuración</label>
    <input type="date" id="setup_date" name="setup_date" class="mt-1 block w-full" value="{{ old('setup_date', $target->setup_date ?? '') }}" >
    @error('setup_date')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="deactivation_date" class="block text-gray-700 dark:text-gray-300">Fecha de Desactivación</label>
    <input type="date" id="deactivation_date" name="deactivation_date" class="mt-1 block w-full" value="{{ old('deactivation_date', $target->deactivation_date ?? '') }}" >
    @error('deactivation_date')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4 w-full">
    <label for="action" class="block text-gray-700 dark:text-gray-300">Acción</label>
    <select id="action" name="action" class="mt-1 block w-full" >
        <option value="attack" {{ old('action', $target->action ?? '') == 'attack' ? 'selected' : '' }}>Attack</option>
        <option value="defense" {{ old('action', $target->action ?? '') == 'defense' ? 'selected' : '' }}>Defense</option>
        <option value="reconnaissance" {{ old('action', $target->action ?? '') == 'reconnaissance' ? 'selected' : '' }}>Reconnaissance</option>
    </select>
    @error('action')
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<div id="map" class="h-[400px] rounded-lg"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar el mapa
        const map = L.map('map').setView([{{ $alert->latitude ?? 40.3716589 }}, {{ $alert->longitude ?? -3.6859131 }}], 5);

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
