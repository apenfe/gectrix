<x-app-layout>

    <x-slot name="header">
        @include('personal.partials.migas')
        @include('personal.partials.navigation_personal')
    </x-slot>

    <div class="py-12 relative">


        @include('personal.partials.create_new', ['route' => 'soldiers.create'])

        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            @if( session('success') )
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                    <p class="font-bold">Error</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif
        </div>

        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap gap-2 p-6">
                @foreach($soldiers as $soldier)
                    @include('personal.soldiers.card_soldier')
                @endforeach
            </div>
            <div class="mt-5">
                {{ $soldiers->links() }}
            </div>
        </div>

    </div>

</x-app-layout>
