<?php

namespace App\Http\Requests\Personal;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function rules(): array
    {

        return [
            'brand' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:car,tank,truck,bus,helicopter,boat'],
            'status' => ['required', 'in:active,inactive'],
            'seats' => ['required', 'integer'],
            'liters' => ['required', 'integer'],
            'liters_per_100km' => ['required', 'integer'],
            'fuel' => ['required', 'in:gasoline,diesel'],
            'liters_reserve' => ['required', 'integer'],
            'price' => ['required', 'integer', 'min:0'],
            'image' => $this->isMethod('PUT')
                ? 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                : 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => ['nullable', 'string', 'max:255'],
            'weight' => ['required', 'numeric', 'min:0'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'weapon_id' => ['nullable', 'exists:weapons,id'],
            'squad_id' => ['nullable', 'exists:squads,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'brand.required' => 'Brand is required',
            'model.required' => 'Model is required',
            'type.required' => 'Type is required',
            'status.required' => 'Status is required',
            'seats.required' => 'Seats is required',
            'liters.required' => 'Liters is required',
            'liters_per_100km.required' => 'Liters per 100km is required',
            'fuel.required' => 'Fuel is required',
            'liters_reserve.required' => 'Liters reserve is required',
            'price.required' => 'Price is required',
            'weight.required' => 'Weight is required',
            'latitude.required' => 'Latitude is required',
            'longitude.required' => 'Longitude is required',
            'weapon_id.exists' => 'Weapon does not exist',
            'squad_id.exists' => 'Squad does not exist',
        ];
    }
}
