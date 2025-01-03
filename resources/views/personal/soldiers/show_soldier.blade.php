@php use App\Models\Personal\Soldier; @endphp
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
                <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">Soldier</span>
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
                        <img src="{{ $soldier->photo }}"
                             alt="{{ __('Soldier Image') }}"
                             class="w-full h-auto rounded-md border border-gray-300 dark:border-gray-600">
                    </div>
                    <div class="w-3/4">
                        @php
                            // uso de mtodo para sacer el ejercitp al que pertenece el soldado
                            $soldier = Soldier::find($soldier->id);
                            $army = $soldier->army;
                        @endphp

                        <img src="{{ asset('storage/private/'.$soldier->rank_image) }}"
                             alt="{{ __('Soldier Image') }}"
                             class="w-full h-auto rounded-md border border-gray-300 dark:border-gray-600">
                    </div>

                    <!-- Soldier Information -->
                    <div class="ml-4 w-3/4">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                            {{ $soldier->name }} {{ $soldier->last_name }}
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('TIM:') }}</span> {{ $soldier->tim }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Rank:') }}</span> {{ $soldier->rank }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Scale:') }}</span> {{ $soldier->scale }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Specialty:') }}</span> {{ $soldier->specialty }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Status:') }}</span>
                            <span
                                class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                {{ $soldier->status }}
                            </span>
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Salary:') }}</span> ${{ $soldier->salary }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Date of Birth:') }}</span> {{ $soldier->date_of_birth }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">{{ __('Date of Death:') }}</span> {{ $soldier->date_of_death }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span
                                class="font-medium">{{ __('Date of Enlistment:') }}</span> {{ $soldier->date_of_enlistment }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span
                                class="font-medium">{{ __('Date of Demobilization:') }}</span> {{ $soldier->date_of_demobilization }}
                        </p>
                    </div>
                </div>
                <div>
                    @include('personal.soldiers.map_soldier', ['soldier' => $soldier])

                    <!-- Additional Details, eliminar -->
                    <div class="mt-4 flex gap-3">
                        <a href="{{ route('soldiers.edit', $soldier) }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            {{ __('Update Soldier') }}
                        </a>
                        <form id="kill-form" action="{{ route('soldiers.kill', $soldier) }}" method="POST">
                            @csrf
                            <button type="button" onclick="killSoldier()"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                {{ __('Killed Soldier') }}
                            </button>
                        </form>
                        <form id="unroll-form" action="{{ route('soldiers.unroll', $soldier) }}" method="POST">
                            @csrf
                            <button type="button" onclick="unrollSoldier()"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                {{ __('Unroll Soldier') }}
                            </button>
                        </form>
                        <form action="{{ route('soldiers.destroy', $soldier) }}" method="POST" class="inline">
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
