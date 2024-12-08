<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Alerts') }}
        </h2>

{{--        @include('personal.partials.navigation_personal')--}}

    </x-slot>

    <div class="py-12">
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                @if($alerts->isEmpty())
                    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items center">
                            <div class="ml-4 text-lg text-gray-600 dark:text-gray-300 leading-7 font-semibold">No hay alertas</div>
                        </div>
                    </div>
                @endif
                @foreach($alerts as $alert)
                    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items center">
                            <div class="ml-4 text-lg text-gray-600 dark:text-gray-300 leading-7 font-semibold">{{ $alert->radius }}</div>
                        </div>
                    </div>
                @endforeach

                    @if($targets->isEmpty())
                        <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items center">
                                <div class="ml-4 text-lg text-gray-600 dark:text-gray-300 leading-7 font-semibold">No hay Objetivos</div>
                            </div>
                        </div>
                    @endif
                    @foreach($targets as $target)
                        <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items center">
                                <div class="ml-4 text-lg text-gray-600 dark:text-gray-300 leading-7 font-semibold">{{ $target->name }}</div>
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </div>

</x-app-layout>
