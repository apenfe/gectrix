@php( $brigade = $brigades->first() )

<div class="w-full">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg mt-16">
        <div class="px-6">
            <div class="flex flex-wrap justify-center">
                <div class="w-full flex justify-center">
                    <div class="relative"><img alt="..." src="{{ asset('storage/private/unit_emblems/'.$brigade->unit_emblem) }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"></div>
                </div>
                <div class="w-fulltext-center mt-20">
                    <div class="flex justify-center lg:pt-4 pt-8 pb-0">
                        <div class="p-3 text-center"><span class="text-xl font-bold block uppercase tracking-wide text-blueGray-700">Ejercito: </span><span class="text-sm text-blueGray-400">{{ $brigade->army }}</span></div>
                        <div class="p-3 text-center"><span class="text-xl font-bold block uppercase tracking-wide text-blueGray-700">Subordinados: </span><span class="text-sm text-blueGray-400">{{ $brigade->current_subordinates }}</span></div>
                        <div class="p-3 text-center"><span class="text-xl font-bold block uppercase tracking-wide text-blueGray-700">Estado: </span><span class="text-sm text-blueGray-400">{{ $brigade->status }}</span></div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-2">
                <h3 class="text-xl font-bold leading-normal mb-2">{{ $brigade->name }}</h3>
                <div class="text-xs mt-0 mb-2 text-blueGray-400 font-bold uppercase"><i class="fas fa-map-marker-alt mr-2 text-blueGray-400 opacity-75"></i>{{ $brigade->latitude.' '. $brigade->longitude }}</div>
            </div>
            <div class="mt-6 py-6 border-t border-blueGray-200 text-center">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4">
                        <p class="font-light leading-relaxed mb-4">{{ $brigade->description }}</p>
                        <p class="font-light leading-relaxed mb-4">Comandante: {{ $brigade->commander->name }}</p>
                        <a href="{{ route('commanders.show', $brigade->commander) }}" class="font-normal text-lightBlue-500 hover:text-lightBlue-600">Comandante</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
