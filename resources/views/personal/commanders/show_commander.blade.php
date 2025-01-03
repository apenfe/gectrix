@php @endphp
<x-app-layout>

    <x-slot name="header">
        @include('personal.partials.migas')
        @include('personal.partials.navigation_personal')
    </x-slot>

    <div class="py-12 relative">
        @session('status')
        <div class="absolute top-0 inset-x-0 px-4 py-3 sm:px-6 sm:py-4">
            <div class="p-2 bg-green-600 items-center text-white leading-none lg:rounded-full flex lg:inline-flex"
                 role="alert">
                <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">Commander</span>
                <span class="font-semibold mr-2 text-left flex-auto">{{ session('status') }}</span>
                <svg @click="open = false" class="fill-current opacity-75 h-4 w-4 cursor-pointer" role="button"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a.5.5 0 0 1-.707 0L10 10.707l-3.646 3.142a.5.5 0 0 1-.765-.638l4-3.429a.5.5 0 0 1 .707 0l4 3.429a.5.5 0 0 1 0 .638z"/>
                </svg>
            </div>
        </div>
        @endsession
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">

            <div class="max-w p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 flex">
                <div class="flex flex-col justify-center items-center">
                    <!-- Weapon Image -->
                    <div class="w-3/4">
                        <img src="{{ $commander->photo }}"
                             alt="{{ __('Commander Image') }}"
                             class="w-full h-auto rounded-md border border-gray-300 dark:border-gray-600">
                    </div>
                    <div class="w-3/4">
                        @php
                            //getArmyAttribute
                                // uso de mtodo para sacer el ejercitp al que pertenece el comandante

                        @endphp

                        <img src="{{ asset('storage/'.$commander->rank_image) }}"
                             alt="{{ __('Commander Image') }}"
                             class="w-full h-auto rounded-md border border-gray-300 dark:border-gray-600">
                    </div>

                    <!-- Soldier Information -->
                    <div class="ml-4 w-3/4">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                            {{ $commander->name }} {{ $commander->last_name }}
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('TIM:') }}</span> {{ $commander->tim }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Rank:') }}</span> {{ $commander->rank }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Scale:') }}</span> {{ $commander->scale }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Specialty:') }}</span> {{ $commander->specialty }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Status:') }}</span>
                            <span
                                class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                {{ $commander->status }}
                            </span>
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Salary:') }}</span> ${{ $commander->salary }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Date of Birth:') }}</span> {{ $commander->date_of_birth }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Date of Death:') }}</span> {{ $commander->date_of_death }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span
                                class="font-medium">{{ __('Date of Enlistment:') }}</span> {{ $commander->date_of_enlistment }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span
                                class="font-medium">{{ __('Date of Demobilization:') }}</span> {{ $commander->date_of_demobilization }}
                        </p>
                    </div>
                </div>
                <div>
                    @include('personal.commanders.map_commander', ['commander' => $commander])

                    <!-- Additional Details, eliminar -->
                    <div class="mt-4 flex gap-3">
                        <a href="{{ route('commanders.edit', $commander) }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            {{ __('Update Commander') }}
                        </a>
                        <form id="kill-form" action="{{ route('commanders.kill', $commander) }}" method="POST">
                            @csrf
                            <button type="button" onclick="killSoldier()"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                {{ __('Killed Commander') }}
                            </button>
                        </form>
                        <form id="unroll-form" action="{{ route('commanders.unroll', $commander) }}" method="POST">
                            @csrf
                            <button type="button" onclick="unrollSoldier()"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                {{ __('Unroll Commander') }}
                            </button>
                        </form>
                        <form action="{{ route('commanders.destroy', $commander) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                {{ __('Delete') }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function unrollSoldier() {
            if (confirm('¿Estás seguro de que quieres cambiar la fecha de desenrole?')) {
                document.getElementById('unroll-form').submit();
            }
        }

        function killSoldier() {
            if (confirm('¿Estás seguro de que quieres cambiar la fecha de defuncion?')) {
                document.getElementById('kill-form').submit();
            }
        }
    </script>
</x-app-layout>
