<div class="w-200 md:w-1/6 m-2">
    <div class="overflow-hidden mb-12 rounded-lg relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded h-550-px transition-all duration-150 ease-in-out hover:transform hover:scale-110 group">
        <div id="vehicle-image" class="absolute rounded-lg w-full h-full bg-50-center bg-cover transition-all duration-1000 ease-in-out group-hover:transform group-hover:scale-110" style="background-image: url({{ asset('storage/private/weapons/'.$weapon->image) }}); backface-visibility: hidden;">
        </div>
        <div class="absolute rounded-lg w-full h-full bg-black opacity-50">
        </div>
        <div class="p-10 flex h-full items-end z-1">
            <div>
                <h1 id="vehicle-brand" class="text-4xl font-semibold mt-0 mb-2 text-white">{{ $weapon->brand }}</h1>
                <h2 id="vehicle-model" class="text-2xl font-semibold mt-0 mb-2 text-white">Modelo: {{ $weapon->model }}</h2>
                <p id="vehicle-type" class="text-lg font-semibold mt-0 mb-2 text-white">Tipo: {{ $weapon->type }}</p>
                <p id="vehicle-status" class="text-lg font-semibold mt-0 mb-2 text-white">Estado: {{ $weapon->status }}</p>
                <p id="vehicle-fuel" class="text-lg font-semibold mt-0 mb-2 text-white">Calibre: {{ $weapon->caliber }}</p>
                <p id="vehicle-price" class="text-lg font-semibold mt-0 mb-2 text-white">Precio: {{ $weapon->price }} €</p>
                <a id="vehicle-link" href="{{ route('weapons.show', $weapon) }}" class="inline-block outline-none focus:outline-none align-middle transition-all duration-150 ease-in-out uppercase border border-solid font-bold last:mr-0 mr-2 text-white bg-red-500 border-red-500 active:bg-red-600 active:border-red-600 text-sm px-6 py-2 shadow hover:shadow-lg rounded-md">Ver arma</a>
            </div>
        </div>
    </div>
</div>
