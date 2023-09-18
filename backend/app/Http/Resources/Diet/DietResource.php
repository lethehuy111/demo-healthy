<?php

namespace App\Http\Resources\Diet;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DietResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'icon' => $this->full_icon
        ];
    }
}
