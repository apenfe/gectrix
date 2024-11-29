@props(['commander'])

<div class="max-w-md p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <div class="flex flex-col justify-center items-center">
        <!-- Vehicle Image -->
        <div class="w-3/4">
            <img src="{{ $commander->photo }}"
                 alt="{{ __('Commander Image') }}"
                 class="w-full h-auto rounded-md border border-gray-300 dark:border-gray-600">
        </div>

        <!-- Vehicle Information -->
        <div class="ml-4 w-3/4">
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                {{ $commander->brand }} {{ $commander->model }}
            </h3>
            <p class="text-gray-700 dark:text-gray-300">
                <span class="font-medium">{{ __('Type:') }}</span> {{ $commander->type }}
            </p>
            <p class="text-gray-700 dark:text-gray-300">
                <span class="font-medium">{{ __('Price:') }}</span> ${{ $commander->price }}
            </p>
            <p class="text-gray-700 dark:text-gray-300">
                <span class="font-medium">{{ __('Status:') }}</span>
                <span class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                    {{ $commander->status }}
                </span>
            </p>
        </div>

        <!-- Additional Details, eliminar -->
        <div class="mt-4 flex gap-3">
            <a href="{{ route('commanders.show', $commander) }}"
               class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                {{ __('View Details') }}
            </a>
        </div>
    </div>
</div>
