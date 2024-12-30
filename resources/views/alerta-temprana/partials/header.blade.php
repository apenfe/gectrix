@if( Route::is('early-warning') )
    <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 justify-center mb-4 mt-4">
        @include('alerta-temprana.partials.filter-alert')
    </div>
    <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 justify-center mb-4 mt-4">
        @include('alerta-temprana.partials.filter-target')
    </div>
@else
    @if( Route::is('alerts.index') )
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 justify-center mb-4 mt-4">
            @include('alerta-temprana.partials.filter-alert')
        </div>
    @else
        <div class="max-w-[90%] mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex m-auto p-4 justify-center mb-4 mt-4">
            @include('alerta-temprana.partials.filter-target')
        </div>
    @endif
@endif
