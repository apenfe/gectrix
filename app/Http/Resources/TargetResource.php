<?php

namespace App\Http\Resources;

use App\Models\EarlyWarning\Target;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Target */
class TargetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'priority' => $this->priority,
            'status' => $this->status,
            'name' => $this->name,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'radius' => $this->radius,
            'image' => $this->image ? url($this->image) : null,
            'logo' => $this->logo ? url($this->logo) : null,
            'setup_date' => $this->setup_date,
            'deactivation_date' => $this->deactivation_date,
            'action' => $this->action,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
