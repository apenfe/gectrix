<?php

namespace App\Http\Requests\EarlyWarning;

use Illuminate\Foundation\Http\FormRequest;

class TargetRequest extends FormRequest
{
    public function rules(): array
    {

        return [
            'priority' => ['required', 'in:low,medium,high'],
            'status' => ['required', 'boolean'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
            'radius' => ['required', 'integer', 'min:1', 'max:100'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'setup_date' => ['required', 'date'],
            'deactivation_date' => ['nullable', 'date'],
            'action' => ['required', 'in:attack,defense,reconnaissance'],
        ];

    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'priority.required' => 'El campo prioridad es obligatorio.',
            'priority.in' => 'El campo prioridad solo puede ser low, medium o high.',
            'status.boolean' => 'El campo estado debe ser un booleano.',
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.string' => 'El campo descripción debe ser una cadena de texto.',
            'description.max' => 'El campo descripción no puede tener más de 255 caracteres.',
            'latitude.required' => 'El campo latitud es obligatorio.',
            'latitude.numeric' => 'El campo latitud debe ser un número.',
            'latitude.between' => 'El campo latitud debe estar entre -90 y 90.',
            'longitude.required' => 'El campo longitud es obligatorio.',
            'longitude.numeric' => 'El campo longitud debe ser un número.',
            'longitude.between' => 'El campo longitud debe estar entre -180 y 180.',
            'radius.required' => 'El campo radio es obligatorio.',
            'radius.integer' => 'El campo radio debe ser un número entero.',
            'radius.min' => 'El campo radio debe ser como mínimo 1.',
            'radius.max' => 'El campo radio debe ser como máximo 100.',
            'image.image' => 'El campo imagen debe ser una imagen.',
            'image.mimes' => 'El campo imagen debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'El campo imagen no puede pesar más de 2MB.',
            'logo.image' => 'El campo logo debe ser una imagen.',
            'logo.mimes' => 'El campo logo debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'logo.max' => 'El campo logo no puede pesar más de 2MB.',
            'setup_date.required' => 'El campo fecha de inicio es obligatorio.',
            'setup_date.date' => 'El campo fecha de inicio debe ser una fecha.',
            'deactivation_date.required' => 'El campo fecha de desactivación es obligatorio.',
            'deactivation_date.date' => 'El campo fecha de desactivación debe ser una fecha.',
            'action.required' => 'El campo acción es obligatorio.',
            'action.in' => 'El campo acción solo puede ser attack, defense o reconnaissance.',
        ];
    }
}
