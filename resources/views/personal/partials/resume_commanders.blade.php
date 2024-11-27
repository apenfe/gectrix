<div id="commander-info" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">

    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('Commander Information') }}</h3>

    <div class="space-y-3">
        <!-- commander name -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Name:') }}</span>
            <span id="commander-name" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->name }}</span>
        </p>

        <!-- commander last name -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Last Name:') }}</span>
            <span id="commander-last-name" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->last_name }}</span>
        </p>

        <!-- commander photo -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Photo:') }}</span>
            <!-- imagen del comandante -->
            <img id="commander-photo" class="w-32 h-32 rounded-full" src="{{ $commanders->first()->photo }}" alt="{{ $commanders->first()->name }}">
        </p>

        <!-- commander tim -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander TIM:') }}</span>
            <span id="commander-tim" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->tim }}</span>
        </p>

        <!-- commander rank -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Rank:') }}</span>
            <span id="commander-rank" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->rank }}</span>
        </p>

        <!-- commander scale -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Scale:') }}</span>
            <span id="commander-scale" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->scale }}</span>
        </p>

        <!-- rank image -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Rank Image:') }}</span>
            <span id="rank-image" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->rank_image }}</span>
        </p>

        <!-- commander specialty -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Specialty:') }}</span>
            <span id="commander-specialty" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->specialty }}</span>
        </p>

        <!-- commander status -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Status:') }}</span>
            <span id="commander-status" class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                {{ $commanders->first()->status }}
            </span>
        </p>

        <!-- commander salary -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Salary:') }}</span>
            <span id="commander-salary" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->salary }}</span>
        </p>

        <!-- commander date of birth -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Date of Birth:') }}</span>
            <span id="commander-date-of-birth" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->date_of_birth }}</span>
        </p>

        <!-- commander date of death -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Date of Death:') }}</span>
            <span id="commander-date-of-death" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->date_of_death }}</span>
        </p>

        <!-- commander date of enlistment -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Date of Enlistment:') }}</span>
            <span id="commander-date-of-enlistment" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->date_of_enlistment }}</span>
        </p>

        <!-- commander date of demobilization -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Commander Date of Demobilization:') }}</span>
            <span id="commander-date-of-demobilization" class="font-semibold text-gray-900 dark:text-gray-100">{{ $commanders->first()->date_of_demobilization }}</span>
        </p>



    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let commanders = @json($commanders);
        let currentIndex = 0;

        function updateCommanderInfo() {
            currentIndex = (currentIndex + 1) % commanders.length;
            document.getElementById('commander-name').textContent = commanders[currentIndex].name;
            document.getElementById('commander-last-name').textContent = commanders[currentIndex].last_name;
            document.getElementById('commander-photo').src = commanders[currentIndex].photo;
            document.getElementById('commander-tim').textContent = commanders[currentIndex].tim;
            document.getElementById('commander-rank').textContent = commanders[currentIndex].rank;
            document.getElementById('commander-scale').textContent = commanders[currentIndex].scale;
            document.getElementById('rank-image').textContent = commanders[currentIndex].rank_image;
            document.getElementById('commander-specialty').textContent = commanders[currentIndex].specialty;
            document.getElementById('commander-status').textContent = commanders[currentIndex].status;
            document.getElementById('commander-salary').textContent = commanders[currentIndex].salary;
            document.getElementById('commander-date-of-birth').textContent = commanders[currentIndex].date_of_birth;
            document.getElementById('commander-date-of-death').textContent = commanders[currentIndex].date_of_death;
            document.getElementById('commander-date-of-enlistment').textContent = commanders[currentIndex].date_of_enlistment;
            document.getElementById('commander-date-of-demobilization').textContent = commanders[currentIndex].date_of_demobilization;
        }

        setInterval(updateCommanderInfo, 60);
    });
</script>
