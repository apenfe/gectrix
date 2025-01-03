<form action="{{ route('weapons.index') }}" method="GET" class="space-y-4">
    @csrf
    <div class="flex flex-wrap gap-4">
        <div class="w-60">
            <div class="form-group mb-3">
                <label for="brand" class="block text-sm font-medium text-gray-700">Marca</label>
                <input type="text" name="brand" id="brand" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" value="{{ request('brand') }}">
                @error('brand')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="w-60">
            <div class="form-group mb-3">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" name="description" id="description" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" value="{{ request('description') }}">
                @error('description')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="w-60">
            <div class="form-group mb-3">
                <label for="action" class="block text-sm font-medium text-gray-700">Tipo de disparo</label>
                <select name="action" id="action" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">Seleccione...</option>
                    <option value="one-shot" {{ request('action') == 'one-shot' ? 'selected' : '' }}>One-shot</option>
                    <option value="non-automatic" {{ request('action') == 'non-automatic' ? 'selected' : '' }}>Non-automatic</option>
                    <option value="semi-automatic" {{ request('action') == 'semi-automatic' ? 'selected' : '' }}>Semi-automatic</option>
                    <option value="automatic" {{ request('action') == 'automatic' ? 'selected' : '' }}>Automatic</option>
                </select>
                @error('action')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="w-60">
            <div class="form-group mb-3">
                <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="status" id="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">Seleccione...</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Activa</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactiva</option>
                </select>
                @error('status')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="w-40">
            <button type="submit" class="btn btn-primary bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Filtrar</button>
        </div>
    </div>
</form>