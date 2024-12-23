<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlertRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'required|in:air-strike,ground-attack,naval-bombardment',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|integer|min:1|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable|string|max:255',
            'danger_level' => 'required|in:low,medium,high',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Type is required',
            'type.in' => 'Type must be air-strike, ground-attack or naval-bombardment',
            'latitude.required' => 'Latitude is required',
            'latitude.numeric' => 'Latitude must be a number',
            'longitude.required' => 'Longitude is required',
            'longitude.numeric' => 'Longitude must be a number',
            'radius.required' => 'Radius is required',
            'radius.integer' => 'Radius must be an integer',
            'radius.min' => 'Radius must be at least 1',
            'radius.max' => 'Radius must be at most 100',
            'start_date.required' => 'Start date is required',
            'start_date.date' => 'Start date must be a date',
            'end_date.required' => 'End date is required',
            'end_date.date' => 'End date must be a date',
            'end_date.after' => 'End date must be after start date',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description must be at most 255 characters',
            'danger_level.required' => 'Danger level is required',
            'danger_level.in' => 'Danger level must be low, medium or high',
        ];
    }
}
