@props(['vehicle','method','route'])
<form action="{{ route($route, isset($vehicle) ? $vehicle : '') }}" method="post" class="mt-6" enctype="multipart/form-data">
    @csrf
    @if($method == 'put')
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Marca</label>
            <input type="text" name="brand" id="brand" value="{{ old('brand', $vehicle->brand ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('brand')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Modelo</label>
            <input type="text" name="model" id="model" value="{{ old('model', $vehicle->model ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('model')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tipo</label>
            <select name="type" id="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="car" {{ old('type', $vehicle->type ?? '') == 'car' ? 'selected' : '' }}>Coche</option>
                <option value="truck" {{ old('type', $vehicle->type ?? '') == 'truck' ? 'selected' : '' }}>Camión</option>
                <option value="bus" {{ old('type', $vehicle->type ?? '') == 'bus' ? 'selected' : '' }}>Autobús</option>
                <option value="tank" {{ old('type', $vehicle->type ?? '') == 'tank' ? 'selected' : '' }}>Tanque</option>
                <option value="helicopter" {{ old('type', $vehicle->type ?? '') == 'helicopter' ? 'selected' : '' }}>Helicóptero</option>
                <option value="boat" {{ old('type', $vehicle->type ?? '') == 'boat' ? 'selected' : '' }}>Barco</option>
            </select>
            @error('type')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Estado</label>
            <select name="status" id="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="active" {{ old('status', $vehicle->status ?? '') == 'active' ? 'selected' : '' }}>Activo</option>
                <option value="inactive" {{ old('status', $vehicle->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('status')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="seats" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Asientos</label>
            <input type="number" name="seats" id="seats" value="{{ old('seats', $vehicle->seats ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('seats')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="liters" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Litros</label>
            <input type="number" name="liters" id="liters" value="{{ old('liters', $vehicle->liters ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('liters')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="liters_per_100km" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Litros por 100km</label>
            <input type="number" name="liters_per_100km" id="liters_per_100km" value="{{ old('liters_per_100km', $vehicle->liters_per_100km ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('liters_per_100km')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="fuel" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Combustible</label>
            <select name="fuel" id="fuel" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="gasoline" {{ old('fuel', $vehicle->fuel ?? '') == 'gasoline' ? 'selected' : '' }}>Gasolina</option>
                <option value="diesel" {{ old('fuel', $vehicle->fuel ?? '') == 'diesel' ? 'selected' : '' }}>Diésel</option>
            </select>
            @error('fuel')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="liters_reserve" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Litros de reserva</label>
            <input type="number" name="liters_reserve" id="liters_reserve" value="{{ old('liters_reserve', $vehicle->liters_reserve ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('liters_reserve')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Precio</label>
            <input type="number" name="price" id="price" value="{{ old('price', $vehicle->price ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('price')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Imagen</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('image')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
            <textarea name="description" id="description" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $vehicle->description ?? '') }}</textarea>
            @error('description')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="weight" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Peso</label>
            <input type="number" name="weight" id="weight" value="{{ old('weight', $vehicle->weight ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('weight')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="latitude" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Latitud</label>
            <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $vehicle->latitude ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('latitude')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="longitude" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Longitud</label>
            <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $vehicle->longitude ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('longitude')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div id="map" style="height: 400px;" class="mt-6"></div>

    <div class="mt-6">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ isset($vehicle) ? 'Actualizar' : 'Crear' }}</button>
    </div>
</form>
