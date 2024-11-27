<div id="soldier-info" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">

    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('Soldiers Information') }}</h3>

    <div class="space-y-3">
        <!-- soldier name -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Name:') }}</span>
            <span id="soldier-name" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->name }}</span>
        </p>

        <!-- soldier last name -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Last Name:') }}</span>
            <span id="soldier-last-name" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->last_name }}</span>
        </p>

        <!-- soldier photo -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Photo:') }}</span>
            <!-- imagen del soldado -->
            <img id="soldier-photo" class="w-32 h-32 rounded-full" src="{{ $soldiers->first()->photo }}" alt="{{ $soldiers->first()->name }}">
        </p>

        <!-- soldier tim -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier TIM:') }}</span>
            <span id="soldier-tim" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->tim }}</span>
        </p>

        <!-- soldier rank -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Rank:') }}</span>
            <span id="soldier-rank" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->rank }}</span>
        </p>

        <!-- soldier scale -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Scale:') }}</span>
            <span id="soldier-scale" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->scale }}</span>
        </p>

        <!-- rank image -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Rank Image:') }}</span>
            <span id="rank-image" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->rank_image }}</span>
        </p>

        <!-- soldier specialty -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Specialty:') }}</span>
            <span id="soldier-specialty" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->specialty }}</span>
        </p>

        <!-- soldier status -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Status:') }}</span>
            <span id="soldier-status" class="px-2 py-1 text-sm font-semibold rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                {{ $soldiers->first()->status }}
            </span>
        </p>

        <!-- soldier salary -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Salary:') }}</span>
            <span id="soldier-salary" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->salary }}</span>
        </p>

        <!-- soldier date of birth -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Date of Birth:') }}</span>
            <span id="soldier-date-of-birth" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->date_of_birth }}</span>
        </p>

        <!-- soldier date of death -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Date of Death:') }}</span>
            <span id="soldier-date-of-death" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->date_of_death }}</span>
        </p>

        <!-- soldier date of enlistment -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Date of Enlistment:') }}</span>
            <span id="soldier-date-of-enlistment" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->date_of_enlistment }}</span>
        </p>

        <!-- soldier date of demobilization -->
        <p class="text-gray-700 dark:text-gray-300 text-lg">
            <span class="font-medium">{{ __('Soldier Date of Demobilization:') }}</span>
            <span id="soldier-date-of-demobilization" class="font-semibold text-gray-900 dark:text-gray-100">{{ $soldiers->first()->date_of_demobilization }}</span>
        </p>



    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let soldiers = @json($soldiers);
        let currentIndex = 0;

        function updateSoldierInfo() {
            currentIndex = (currentIndex + 1) % soldiers.length;
            document.getElementById('soldier-name').textContent = soldiers[currentIndex].name;
            document.getElementById('soldier-last-name').textContent = soldiers[currentIndex].last_name;
            document.getElementById('soldier-photo').src = soldiers[currentIndex].photo;
            document.getElementById('soldier-tim').textContent = soldiers[currentIndex].tim;
            document.getElementById('soldier-rank').textContent = soldiers[currentIndex].rank;
            document.getElementById('soldier-scale').textContent = soldiers[currentIndex].scale;
            document.getElementById('rank-image').textContent = soldiers[currentIndex].rank_image;
            document.getElementById('soldier-specialty').textContent = soldiers[currentIndex].specialty;
            document.getElementById('soldier-status').textContent = soldiers[currentIndex].status;
            document.getElementById('soldier-salary').textContent = soldiers[currentIndex].salary;
            document.getElementById('soldier-date-of-birth').textContent = soldiers[currentIndex].date_of_birth;
            document.getElementById('soldier-date-of-death').textContent = soldiers[currentIndex].date_of_death;
            document.getElementById('soldier-date-of-enlistment').textContent = soldiers[currentIndex].date_of_enlistment;
            document.getElementById('soldier-date-of-demobilization').textContent = soldiers[currentIndex].date_of_demobilization;

        }

        setInterval(updateSoldierInfo, 20);
    });
</script>
