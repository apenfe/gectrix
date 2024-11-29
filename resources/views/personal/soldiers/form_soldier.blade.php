@props(['weapon','method','route'])

<form action="{{ route($route, isset($weapon) ? $weapon : '') }}" method="post" class="mt-6" enctype="multipart/form-data">
    @csrf
    @if($method == 'put')
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Marca</label>
            <input type="text" name="brand" id="brand" value="{{ old('brand', $weapon->brand ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('brand')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Modelo</label>
            <input type="text" name="model" id="model" value="{{ old('model', $weapon->model ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('model')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="caliber" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Calibre</label>
            <input type="text" name="caliber" id="caliber" value="{{ old('caliber', $weapon->caliber ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('caliber')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tipo</label>
            <select name="type" id="type" value="{{ old('type', $weapon->type ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="pistol">Pistola</option>
                <option value="rifle">Rifle</option>
                <option value="machine gun">Ametralladora</option>
                <option value="sniper rifle">Rifle de francotirador</option>
                <option value="grenade launcher">Lanzagranadas</option>
                <option value="rocket launcher">Lanzacohetes</option>
                <option value="mortar">Mortero</option>
                <option value="missile launcher">Lanzamisiles</option>
                <option value="laser gun">Pistola láser</option>
                <option value="plasma gun">Pistola de plasma</option>
                <option value="ion gun">Pistola de iones</option>
                <option value="microwave gun">Pistola de microondas</option>
            </select>
            @error('type')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="action" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Acción</label>
            <select name="action" id="action" value="{{ old('action', $weapon->action ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                <option value="one-shot">Un disparo</option>
                <option value="non-automatic">No automática</option>
                <option value="semi-automatic">Semi automática</option>
                <option value="automatic">Automática</option>
            </select>
            @error('action')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Estado</label>
            <select name="status" id="status" value="{{ old('status', $weapon->status ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                <option value="active">Activa</option>
                <option value="inactive">Inactiva</option>
            </select>
            @error('status')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Precio</label>
            <input type="number" name="price" id="price" value="{{ old('price', $weapon->price ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            @error('price')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Imagen</label>
            <input type="file" name="image" id="image" value="{{ old('image', $weapon->image ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('image')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
            <textarea name="description" id="description" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $weapon->description ?? '') }}</textarea>
            @error('description')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="deviceId" class="block text-sm font-medium text-gray-700 dark:text-gray-200">ID Dispositivo</label>
            <input type="text" name="deviceId" id="deviceId" value="{{ old('deviceId', $weapon->deviceId ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            @error('deviceId')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="maxRange" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Rango máximo</label>
            <input type="number" name="maxRange" id="maxRange" value="{{ old('maxRange', $weapon->maxRange ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            @error('maxRange')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="weight" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Peso</label>
            <input type="number" name="weight" id="weight" value="{{ old('weight', $weapon->weight ?? '') }}" class="mt-1 block
                            w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            @error('weight')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="latitude" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Latitud</label>
            <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $weapon->latitude ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            @error('latitude')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="longitude" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Longitud</label>
            <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $weapon->longitude ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
            @error('longitude')
            <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div id="map" style="height: 400px;" class="mt-6"></div>

    <div class="mt-6">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ isset($weapon)? 'Actualizar' : 'Crear' }}</button>
    </div>
</form>
