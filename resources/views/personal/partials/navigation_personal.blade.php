<!-- crear botones para ir a armas, vehículos, soldados, mandos y brigadas -->
<div class="flex justify-center gap-2 mt-4 mb-4">
    <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        <a href="{{ route('personal.index') }}">{{ __('Resume') }}</a>
    </x-button>
    <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        <a href="{{ route('personal.weapons') }}">{{ __('Weapons') }}</a>
    </x-button>
    <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        <a href="{{ route('personal.vehicles') }}">{{ __('Vehicles') }}</a>
    </x-button>
    <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        <a href="{{ route('personal.soldiers') }}">{{ __('Soldiers') }}</a>
    </x-button>
    <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        <a href="{{ route('personal.commanders') }}">{{ __('Commanders') }}</a>
    </x-button>
    <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        <a href="{{ route('personal.brigades') }}">{{ __('Brigades') }}</a>
    </x-button>
</div>
