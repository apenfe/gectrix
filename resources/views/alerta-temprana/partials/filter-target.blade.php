<form method="GET" action="{{ Route::is('early-warning') ? route('early-warning') : route('targets.index') }}" class="w-full flex gap-4">
    {{--                priority --}}
    <select name="priority" class="form-select w-full">
        <option value="">Prioridad</option>
        <option value="low">Bajo</option>
        <option value="medium">Medio</option>
        <option value="high">Alto</option>
    </select>
    {{--                status --}}
    <select name="status" class="form-select w-full">
        <option value="">Estado</option>
        <option value="true">Activa</option>
        <option value="false">Inactiva</option>
    </select>
    {{--                name --}}
    <input type="text" name="name" placeholder="Buscar objetivo..." class="form-input w-full">
    {{--                description --}}
    <input type="text" name="description" placeholder="Buscar descripción..." class="form-input w-full">
    {{--                setup date --}}
    <input type="date" name="setup_date" class="form-input w-full">
    {{--                deactivation date --}}
    <input type="date" name="deactivation_date" class="form-input w-full">
    {{--                action--}}
    <select name="action" class="form-select w-full">
        <option value="">Acción</option>
        <option value="attack">Atacar</option>
        <option value="defense">Defender</option>
        <option value="reconnaissance">Reconocimiento</option>
    </select>
    <button type="submit" class="btn btn-primary">Buscar Target</button>
</form>
