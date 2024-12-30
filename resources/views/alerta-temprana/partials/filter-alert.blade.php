<form method="GET" action="{{ Route::is('early-warning') ? route('early-warning') : route('alerts.index') }}" class="w-full flex gap-4">
    <input type="text" name="description" placeholder="Buscar alerta..." class="form-input w-full">
    <select name="danger_level" class="form-select w-full">
        <option value="">Nivel de peligro</option>
        <option value="low">Bajo</option>
        <option value="medium">Medio</option>
        <option value="high">Alto</option>
    </select>
    {{--                type --}}
    <select name="type" class="form-select w-full">
        <option value="">Tipo de alerta</option>
        <option value="air-strike">Ataque aéreo</option>
        <option value="ground-attack">Ataque terrestre</option>
        <option value="naval-bombardment">Ataque naval</option>
    </select>
    {{--                start date --}}
    <input type="date" name="start_date" class="form-input w-full">
    {{--                end date --}}
    <input type="date" name="end_date" class="form-input w-full">
    <button type="submit" class="btn btn-primary">Buscar Alert</button>
</form>
