<?php

namespace App\Http\Requests\EarlyWarning;

use Illuminate\Foundation\Http\FormRequest;

class SatRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'satellite' => ['required', 'string', 'in:sentinel1,sentinel2'],
            'cloud_coverage' => ['required', 'numeric', 'min:0', 'max:100'],
            'latitude_north' => ['required', 'numeric', 'min:-90', 'max:90'],
            'latitude_south' => ['required', 'numeric', 'min:-90', 'max:90'],
            'longitude_east' => ['required', 'numeric', 'min:-180', 'max:180'],
            'longitude_west' => ['required', 'numeric', 'min:-180', 'max:180'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
