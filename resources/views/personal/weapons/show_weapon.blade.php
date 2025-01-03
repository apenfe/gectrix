<x-app-layout>

    <x-slot name="header">
        @include('personal.partials.navigation_personal')
    </x-slot>

    <div class="py-12 relative">
        <div class="max-w-[80%] mx-auto sm:px-6 lg:px-8">

                <div class="max-w p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 flex">
                    <div class="flex flex-col justify-center items-center">
                        <!-- Weapon Image -->
                        <div class="w-3/4">
                            <img src="{{ asset('storage/private/weapons/'.$weapon->image) }}"
                                 alt="{{ __('Weapon Image') }}"
                                 class="w-full h-auto rounded-md border border-gray-300 dark:border-gray-600">
                        </div>

                        <!-- Weapon Information -->
                        <div class="ml-4 w-3/4">

                            <!--
                            $table->decimal('weight', 5, 2);
                            -->
                            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                                {{ $weapon->brand }} {{ $weapon->model }}
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300">
                                <span class="font-medium">{{ __('Caliber:') }}</span> {{ $weapon->caliber }}
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                <span class="font-medium">{{ __('Type:') }}</span> {{ $weapon->type }}
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                <span class="font-medium">{{ __('Device ID:') }}</span> {{ $weapon->deviceId }}
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                <span class="font-medium">{{ __('Price:') }}</span> ${{ $weapon->price }}
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                <span class="font-medium">{{ __('Status:') }}</span>
                                <span class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    {{ $weapon->status }}
                                </span>
                            </p>

                            <p class="text-gray-700 dark:text-gray-300">
                                <span class="font-medium">{{ __('Action:') }}</span> {{ $weapon->action }}
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                <span class="font-medium">{{ __('Max Range:') }}</span> {{ $weapon->maxRange }}
                                <span class="font-medium">{{ __('meters') }}</span>
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                <span class="font-medium">{{ __('Description:') }}</span> {{ $weapon->description }}
                            </p>

                            <p class="text-gray-700 dark:text-gray-300">
                                <span class="font-medium">{{ __('Weight:') }}</span> {{ $weapon->weight }}
                                <span class="font-medium">{{ __('kg') }}</span>
                            </p>

                        </div>
                    </div>
                    <div>
                        @include('personal.weapons.map_weapon', ['weapon' => $weapon])

                        <!-- Additional Details, eliminar -->
                        <div class="mt-4 flex gap-3">
                            <a href="{{ route('weapons.edit', $weapon) }}"
                               class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                {{ __('Update Weapon') }}
                            </a>
                            <form action="{{ route('weapons.destroy', $weapon) }}" method="POST" class="inline">
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

</x-app-layout>
