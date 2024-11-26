<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Personal') }}
        </h2>

        <!-- crear botones para ir a armas, vehiculos, soldados, mandos y brigadas -->
        <div class="flex justify-center">
            <a href="{{ route('personal.weapons') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Weapons') }}</a>
            <a href="{{ route('personal.vehicles') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Vehicles') }}</a>
            <a href="{{ route('personal.soldiers') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Soldiers') }}</a>
            <a href="{{ route('personal.commanders') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Commanders') }}</a>
            <a href="{{ route('personal.brigades') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Brigades') }}</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div id="brigade-info" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('Brigade Information') }}</h3>
                    <div class="space-y-3">
                        <!-- Brigade Name -->
                        <p class="text-gray-700 dark:text-gray-300 text-lg">
                            <span class="font-medium">{{ __('Brigade Name:') }}</span>
                            <span id="brigade-name" class="font-semibold text-gray-900 dark:text-gray-100">{{ $brigades->first()->name }}</span>
                        </p>
                        <!-- Status -->
                        <p class="text-gray-700 dark:text-gray-300 text-lg">
                            <span class="font-medium">{{ __('Status:') }}</span>
                            <span id="brigade-status" class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                {{ $brigades->first()->status }}
                            </span>
                        </p>

                        <!-- Combat Logo -->
                        <div>
                            <p class="text-gray-700 dark:text-gray-300 text-lg font-medium">{{ __('Combat Logo:') }}</p>
                            <img src="{{ asset('storage/private/'.$brigades->first()->combat_logo) }}" alt="Combat Logo" class="w-16 h-16 rounded-md border border-gray-300 dark:border-gray-600">
                        </div>

                        <!-- Unit Emblem -->
                        <div>
                            <p class="text-gray-700 dark:text-gray-300 text-lg font-medium">{{ __('Unit Emblem:') }}</p>
                            <img src="{{ asset('storage/private/'.$brigades->first()->unit_emblem) }}" alt="Unit Emblem" class="w-16 h-16 rounded-md border border-gray-300 dark:border-gray-600">
                        </div>

                        <!-- Commander -->
                        <p class="text-gray-700 dark:text-gray-300 text-lg">
                            <span class="font-medium">{{ __('Commander:') }}</span>
                            <span id="brigade-commander" class="font-semibold text-gray-900 dark:text-gray-100">{{ $brigades->first()->commander->name }}</span>
                        </p>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        let brigades = @json($brigades);
                        let currentIndex = 0;

                        function updateBrigadeInfo() {
                            currentIndex = (currentIndex + 1) % brigades.length;
                            document.getElementById('brigade-id').textContent = brigades[currentIndex].id;
                            document.getElementById('brigade-name').textContent = brigades[currentIndex].name;
                        }

                        setInterval(updateBrigadeInfo, 23000);
                    });
                </script>


                {{-- Sección para mostrar las weapons --}}
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Weapons') }}</h3>
                    <ul>
                        @foreach ($weapons as $weapon)
                            <li>{{ $weapon->brand }}</li>
                        @endforeach
                    </ul>
                </div>

                {{-- Sección para mostrar los soldiers --}}
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Soldiers') }}</h3>
                    <ul>
                        @foreach ($soldiers as $soldier)
                            <li>{{ $soldier->name }}</li>
                        @endforeach
                    </ul>
                </div>

                {{-- Sección para mostrar los commanders --}}
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Commanders') }}</h3>
                    <ul>
                        @foreach ($commanders as $commander)
                            <li>{{ $commander->name }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
