<?php

namespace App\Http\Requests\Personal;

use Illuminate\Foundation\Http\FormRequest;

class WeaponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand' => 'required',
            'model' => 'required',
            'caliber' => 'required',
            'type' => 'required',
            'action' => 'required',
            'status' => 'required',
            'price' => 'required',
            'deviceId' => 'required',
            'image' => $this->isMethod('PUT')
                ? 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                : 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'maxRange' => 'required',
            'weight' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'brand.required' => 'Brand is required',
            'model.required' => 'Model is required',
            'caliber.required' => 'Caliber is required',
            'type.required' => 'Type is required',
            'action.required' => 'Action is required',
            'status.required' => 'Status is required',
            'price.required' => 'Price is required',
            'deviceId.required' => 'Device ID is required',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max' => 'Image must be smaller than 2048 KB',
            'description.required' => 'Description is required',
            'maxRange.required' => 'Max Range is required',
            'weight.required' => 'Weight is required',
            'latitude.required' => 'Latitude is required',
            'longitude.required' => 'Longitude is required',
        ];
    }
}
