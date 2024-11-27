<div id="weapon-info" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">

    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('Weapon Information') }}</h3>

    <!--
            $table->unsignedInteger('price')->default(0);
            $table->string('device-id')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('max-range');
            $table->decimal('weight', 5, 2);
    -->
    <div class="space-y-3">
        <!-- Weapon Brand -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Weapon Brand:') }}</span>
            <span id="weapon-brand" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->brand }}</span>
        </p>
        <!-- Weapon Model -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Weapon Model:') }}</span>
            <span id="weapon-model" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->model }}</span>
        </p>
        <!-- Weapon Status -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Status:') }}</span>
            <span id="weapon-status" class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                {{ $weapons->first()->status }}
            </span>
        </p>
        <!-- Weapon type -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Type:') }}</span>
            <span id="weapon-type" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->type }}</span>
        </p>

        <!-- Weapon Caliber -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Caliber:') }}</span>
            <span id="weapon-caliber" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->caliber }}</span>
        </p>

        <!-- Weapon Action -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Action:') }}</span>
            <span id="weapon-action" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->action }}</span>
        </p>

        <!-- Weapon Price -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Price:') }}</span>
            <span id="weapon-price" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->price }}</span>
        </p>

        <!-- Weapon Device ID -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Device ID:') }}</span>
            <span id="weapon-device-id" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->deviceid }}</span>
        </p>

        <!-- Weapon Image -->
        <div>
            <p class="text-gray-700 dark:text-gray-300 text-lg font-medium">{{ __('Weapon Image:') }}</p>
            <img src="{{ asset('storage/private/'.$weapons->first()->image) }}" alt="Weapon Image" class="w-16 h-16 rounded-md border border-gray-300 dark:border-gray-600" id="image">

        </div>

        <!-- Weapon Description -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Description:') }}</span>
            <span id="weapon-description" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->description }}</span>
        </p>

        <!-- Weapon Max Range -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Max Range:') }}</span>
            <span id="weapon-max-range" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->max_range }}</span>
        </p>

        <!-- Weapon Weight -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Weight:') }}</span>
            <span id="weapon-weight" class="font-semibold text-gray-900 dark:text-gray-100">{{ $weapons->first()->weight }}</span>
        </p>



    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let weapons = @json($weapons);
        let currentIndex = 0;

        function updateWeaponInfo() {
            currentIndex = (currentIndex + 1) % weapons.length;
            document.getElementById('weapon-brand').textContent = weapons[currentIndex].brand;
            document.getElementById('weapon-model').textContent = weapons[currentIndex].model;
            document.getElementById('weapon-status').textContent = weapons[currentIndex].status;
            document.getElementById('weapon-type').textContent = weapons[currentIndex].type;
            document.getElementById('weapon-caliber').textContent = weapons[currentIndex].caliber;
            document.getElementById('weapon-action').textContent = weapons[currentIndex].action;
            document.getElementById('weapon-price').textContent = weapons[currentIndex].price;
            document.getElementById('weapon-device-id').textContent = weapons[currentIndex].deviceid;
            document.getElementById('weapon-description').textContent = weapons[currentIndex].description;
            document.getElementById('image').src = '/storage/private/' + weapons[currentIndex].image;
            document.getElementById('weapon-max-range').textContent = weapons[currentIndex].max_range;
            document.getElementById('weapon-weight').textContent = weapons[currentIndex].weight;
        }

        setInterval(updateWeaponInfo, 10);
    });
</script>
