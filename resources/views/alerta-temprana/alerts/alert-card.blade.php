<div class="w-full md:w-1/4">
    <div class="shadow-lg rounded-lg relative flex flex-col min-w-0 break-words bg-white w-full mb-6">
        <div class="relative">
            <img alt="..." class="w-full flex-shrink-0 rounded-t-lg" src="https://uy.usembassy.gov/wp-content/uploads/sites/170/2022/12/Alert-Graphics-for-MW_ALERT-750x450.jpg">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="block w-full absolute text-white svg-bg" style="height: 95px; bottom: 0px;">
                <polygon points="583,55 583,95 0,95" style="fill: currentcolor;"></polygon>
            </svg>
        </div>
        <div class="px-4 py-5 flex-auto">
            <h3 class="text-2xl font-bold">{{ $alert->type }}</h3>
            <p class="text-sm mt-1 mb-5 text-blueGray-400 font-bold uppercase">{{ $alert->description }}</p>
            <div class="block w-full" style="overflow-x: auto;">
                <ul class="list-none">
                    <li class="py-1">
                        <div class="flex items-center">
                            <span class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-lightBlue-500 bg-lightBlue-200"><i class="fas fa-bomb"></i></span>
                            <h6 class="text-md text-blueGray-500">{{ $alert->danger_level }}</h6>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="flex items-center">
                            <span class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-emerald-500 bg-emerald-200"><i class="fas fa-hourglass-start"></i></span>
                            <h6 class="text-md text-blueGray-500">{{ $alert->start_date }}</h6>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="flex items-center">
                            <span class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-red-500 bg-red-200"><i class="fas fa-hourglass-end"></i></span>
                            <h6 class="text-md text-blueGray-500">{{ $alert->end_date }}</h6>
                        </div>
                    </li>
                    {{--  Botones de edicion, ver y eliminar --}}
                    <li class="py-1">
                        <div class="flex items-center justify-center">
                            <a href="{{ route('alerts.edit', $alert) }}" class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-lightBlue-500 bg-lightBlue-200"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('alerts.show', $alert) }}" class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-emerald-500 bg-emerald-200"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('alerts.destroy', $alert) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-red-500 bg-red-200"><i class="fas fa-trash"></i></button>
                            </form>
                            <form action="{{ route('telegram.store') }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-blue-500 bg-blue-200"><i class="fas fa-telegram"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
