<x-app-layout>

    <x-slot name="header">
        @include('alerta-temprana.partials.navigation_alert')
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('targets.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('alerta-temprana.targets.form')
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
