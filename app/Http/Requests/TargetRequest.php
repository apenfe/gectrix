<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TargetRequest extends FormRequest
{
    public function rules(): array
    {

        return [
            'priority' => ['required', 'in:low,medium,high'],
            'status' => ['boolean'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
            'radius' => ['required', 'integer', 'min:1', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'setup_date' => ['required', 'date'],
            'deactivation_date' => ['required', 'date'],
            'action' => ['required', 'in:attack,defense,reconnaissance'],
        ];

    }



    public function authorize(): bool
    {
        return true;
    }
}
