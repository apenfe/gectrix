<div class="w-full md:w-1/3">
    <div class="shadow-lg rounded-lg relative flex flex-col min-w-0 break-words bg-white w-full mb-6">
        <div class="relative">
            <img alt="..." class="w-full flex-shrink-0 rounded-t-lg" src="{{ $target->image != null ? asset('/targets/images/'.$target->image) : asset('/targets/images/target.png') }}">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="block w-full absolute text-white svg-bg" style="height: 95px; bottom: 0px;">
                <polygon points="583,55 583,95 0,95" style="fill: currentcolor;"></polygon>
            </svg>
        </div>
        <div class="px-4 py-5 flex-auto">
            <h3 class="text-2xl font-bold">{{ $target->name }}</h3>
            <p class="text-sm mt-1 mb-5 text-blueGray-400 font-bold uppercase">{{ $target->description }}</p>
            <div class="block w-full" style="overflow-x: auto;">
                <ul class="list-none">
                    <li class="py-1">
                        <div class="flex items-center">
                            <span class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-lightBlue-500 bg-lightBlue-200"><i class="fas fa-bomb"></i></span>
                            <h6 class="text-md text-blueGray-500">{{ $target->priority }}</h6>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="flex items-center">
                            <span class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-emerald-500 bg-emerald-200"><i class="fas fa-hourglass-start"></i></span>
                            <h6 class="text-md text-blueGray-500">{{ $target->action }}</h6>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="flex items-center">
                            <span class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-red-500 bg-red-200"><i class="fas fa-hourglass-end"></i></span>
                            <h6 class="text-md text-blueGray-500">{{ $target->status ? 'on watch' : 'finished' }}</h6>
                        </div>
                    </li>
                    {{--  Botones de edicion, ver y eliminar --}}
                    <li class="py-1">
                        <div class="flex items-center justify-center">
                            <a href="{{ route('targets.edit', $target) }}" class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-lightBlue-500 bg-lightBlue-200"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('targets.show', $target) }}" class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-emerald-500 bg-emerald-200"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('targets.destroy', $target) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex text-center rounded-full mr-3 items-center justify-center w-8 h-8 text-sm text-red-500 bg-red-200"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
