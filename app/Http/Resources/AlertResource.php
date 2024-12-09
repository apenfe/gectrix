<?php

namespace App\Http\Resources;

use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Alert */
class AlertResource extends JsonResource {
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'type' => $this->type,
            // mostrar enlace a mapa google maps
            'location' => 'https://www.google.com/maps/search/?api=1&query='.$this->latitude.','.$this->longitude,
            'radius' => $this->radius . ' km',
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'duration' => $this->end_date->diffForHumans($this->start_date),
            'status' => $this->end_date >= now() ? 'active' : 'ended',
            'description' => $this->description,
            'danger_level' => $this->danger_level,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
