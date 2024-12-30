<div class="flex justify-center gap-2 mt-4 mb-4">
    <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        <a href="{{ route('early-warning') }}">{{ __('Resume') }}</a>
    </x-button>
    <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        <a href="{{ route('alerts.index') }}">{{ __('Alerts') }}</a>
    </x-button>
    <x-button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
        <a href="{{ route('targets.index') }}">{{ __('Targets') }}</a>
    </x-button>
</div>
