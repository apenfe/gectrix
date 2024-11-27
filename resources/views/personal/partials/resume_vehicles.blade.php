<!-- tabla resumen vehiculos -->

<div id="vehicle-info" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">

    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('Vehicles Information') }}</h3>

    <!--
            $table->string('image')->nullable();
    -->

    <div class="space-y-3">
        <!-- vehicle brand -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Vehicle Brand:') }}</span>
            <span id="vehicle-brand" class="font-semibold text-gray-900 dark:text-gray-100">{{ $vehicles->first()->brand }}</span>
        </p>

        <!-- vehicle model -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Vehicle Model:') }}</span>
            <span id="vehicle-model" class="font-semibold text-gray-900 dark:text-gray-100">{{ $vehicles->first()->model }}</span>
        </p>

        <!-- vehicle type -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Vehicle Type:') }}</span>
            <span id="vehicle-type" class="font-semibold text-gray-900 dark:text-gray-100">{{ $vehicles->first()->type }}</span>
        </p>

        <!-- vehicle status -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Vehicle Status:') }}</span>
            <span id="vehicle-status" class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                {{ $vehicles->first()->status }}
            </span>
        </p>

        <!-- vehicle fuel -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Vehicle Fuel:') }}</span>
            <span id="vehicle-fuel" class="font-semibold text-gray-900 dark:text-gray-100">{{ $vehicles->first()->fuel }}</span>
        </p>

        <!-- vehicle price -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Vehicle Price:') }}</span>
            <span id="vehicle-price" class="font-semibold text-gray-900 dark:text-gray-100">{{ $vehicles->first()->price }}</span>
        </p>

        <!-- image -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Vehicle Image:') }}</span>
            <img id="vehicle-image" class="w-32 h-32 rounded-full" src="{{ asset('storage/private/'.$vehicles->first()->image) }}" alt="{{ $vehicles->first()->brand }}">
        </p>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let vehicles = @json($vehicles);
        let currentIndex = 0;

        function updateVehicleInfo() {
            currentIndex = (currentIndex + 1) % vehicles.length;
            document.getElementById('vehicle-brand').textContent = vehicles[currentIndex].brand;
            document.getElementById('vehicle-model').textContent = vehicles[currentIndex].model;
            document.getElementById('vehicle-type').textContent = vehicles[currentIndex].type;
            document.getElementById('vehicle-status').textContent = vehicles[currentIndex].status;
            document.getElementById('vehicle-fuel').textContent = vehicles[currentIndex].fuel;
            document.getElementById('vehicle-price').textContent = vehicles[currentIndex].price;
            document.getElementById('vehicle-image').src = "{{ asset('storage/private/') }}/" + vehicles[currentIndex].image;


        }

        setInterval(updateVehicleInfo, 200);
    });
</script>
