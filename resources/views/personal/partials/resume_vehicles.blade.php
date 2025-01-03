<!-- tabla resumen vehiculos -->
<div class="w-full md:w-1/2 m-4">
    <div class="overflow-hidden mb-12 rounded-lg relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded h-550-px transition-all duration-150 ease-in-out hover:transform hover:scale-110 group">
        <div id="vehicle-image" class="absolute rounded-lg w-full h-full bg-50-center bg-cover transition-all duration-1000 ease-in-out group-hover:transform group-hover:scale-110" style="background-image: url({{ asset('storage/private/vehicles/'.$vehicle->image) }}); backface-visibility: hidden;">
        </div>
        <div class="absolute rounded-lg w-full h-full bg-black opacity-50">
        </div>
        <div class="p-10 flex h-full items-end z-1">
            <div>
                <h1 id="vehicle-brand" class="text-4xl font-semibold mt-0 mb-2 text-white">{{ $vehicle->brand }}</h1>
                <h2 id="vehicle-model" class="text-2xl font-semibold mt-0 mb-2 text-white">{{ $vehicle->model }}</h2>
                <p id="vehicle-type" class="text-lg font-semibold mt-0 mb-2 text-white">{{ $vehicle->type }}</p>
                <p id="vehicle-status" class="text-lg font-semibold mt-0 mb-2 text-white">{{ $vehicle->status }}</p>
                <p id="vehicle-fuel" class="text-lg font-semibold mt-0 mb-2 text-white">{{ $vehicle->fuel }}</p>
                <p id="vehicle-price" class="text-lg font-semibold mt-0 mb-2 text-white">{{ $vehicle->price }}</p>
                <a id="vehicle-link" href="{{ route('vehicles.show', $vehicle) }}" class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2 text-white bg-red-500 border-red-500 active:bg-red-600 active:border-red-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md">Ir a vehículo</a>
            </div>
        </div>
    </div>
</div>
