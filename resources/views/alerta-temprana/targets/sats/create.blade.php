<x-app-layout>

    <x-slot name="header">
        @include('alerta-temprana.partials.navigation_alert')
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('sat.store',$target) }}" method="POST">
                    @csrf
                    @include('alerta-temprana.targets.sats.form')
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Cargar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>