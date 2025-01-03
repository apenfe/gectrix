<x-app-layout>

    <x-slot name="header">
        @include('personal.partials.navigation_personal')
        @include('personal.partials.header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex flex-row gap-3">
                    @include('personal.partials.resume_brigade')
                </div>

                <div class="flex flex-row gap-3">
                    @foreach($vehicles as $vehicle)
                        @include('personal.partials.resume_vehicles')
                    @endforeach
                </div>
                <div class="flex flex-row gap-2 flex-wrap justify-center">
                    @foreach($weapons as $weapon)
                        @include('personal.partials.resume_weapons')
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
