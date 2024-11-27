<x-app-layout>

    <x-slot name="header">

            <nav class="text-gray-500 dark:text-gray-400 text-sm">
                <ol class="list-reset flex">
                    @php
                        $segments = Request::segments();
                    @endphp
                    @foreach($segments as $index => $segment)
                        <li>
                            <a href="{{ url(implode('/', array_slice($segments, 0, $index + 1))) }}" class="hover:text-gray-700 dark:hover:text-gray-300">
                                {{ ucfirst($segment) }}
                            </a>
                            @if(!$loop->last)
                                <span class="mx-2"> / </span>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </nav>

        @include('personal.partials.navigation_personal')

    </x-slot>

    <div class="py-12">
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @foreach($weapons as $weapon)
                  @include('personal.weapons.card_weapon')
                @endforeach
            </div>
            <div class="mt-5">
                {{ $weapons->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
