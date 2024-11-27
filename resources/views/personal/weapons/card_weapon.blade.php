@props(['weapon'])

<div>
    <div>
        <div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('Weapon') }}{{': '.$weapon->deviceid}}</h3>
        </div>
        <div>
            <!-- Weapon Brand -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Weapon Brand:') }}</span>
                <span id="weapon-brand" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->brand }}</span>
            </p>
            <!-- Weapon Model -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Weapon Model:') }}</span>
                <span id="weapon-model" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->model }}</span>
            </p>
            <!-- Weapon Status -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Status:') }}</span>
                <span id="weapon-status" class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    {{ $weapon->status }}
                                </span>
            </p>
            <!-- Weapon type -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Type:') }}</span>
                <span id="weapon-type" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->type }}</span>
            </p>

            <!-- Weapon Caliber -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Caliber:') }}</span>
                <span id="weapon-caliber" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->caliber }}</span>
            </p>

            <!-- Weapon Action -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Action:') }}</span>
                <span id="weapon-action" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->action }}</span>
            </p>

            <!-- Weapon Price -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Price:') }}</span>
                <span id="weapon-price" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->price }}</span>
            </p>

            <!-- Weapon Device ID -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Device ID:') }}</span>
                <span id="weapon-device-id" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->deviceid }}</span>
            </p>

            <!-- Weapon Image -->
            <div>
                <p class="text-gray-700 dark:text-gray-300 text-lg font-medium">{{ __('Weapon Image:') }}</p>
                <img src="{{ asset('storage/private/'.$weapon->image) }}" alt="Weapon Image" class="w-16 h-16 rounded-md border border-gray-300 dark:border-gray-600" id="image">

            </div>

            <!-- Weapon Description -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Description:') }}</span>
                <span id="weapon-description" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->description }}</span>
            </p>

            <!-- Weapon Max Range -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Max Range:') }}</span>
                <span id="weapon-max-range" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->max_range }}</span>
            </p>

            <!-- Weapon Weight -->
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <span class="font-medium">{{ __('Weight:') }}</span>
                <span id="weapon-weight" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapon->weight }}</span>
            </p>
        </div>
    </div>
    <div>
        <!-- Botones de acción -->
        <div class="flex gap-3">
            <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Edit Weapon') }}
            </a>
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Delete Weapon') }}
                </button>
            </form>
        </div>
    </div>
</div>
