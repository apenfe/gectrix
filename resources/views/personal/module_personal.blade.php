<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Personal') }}
        </h2>

        @include('personal.partials.navigation_personal')

    </x-slot>

    <div class="py-12">
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex flex-row gap-3">
                    @include('personal.partials.resume_brigade')
                </div>

                <div class="flex flex-row gap-3">
                    @include('personal.partials.resume_commanders')
                    @include('personal.partials.resume_soldiers')
                </div>

                <div class="flex flex-row gap-3">
                    @include('personal.partials.resume_vehicles')
                    @include('personal.partials.resume_weapons')
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
