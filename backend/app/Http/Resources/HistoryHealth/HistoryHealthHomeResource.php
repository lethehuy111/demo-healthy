<?php

namespace App\Http\Resources\HistoryHealth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryHealthHomeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'month' => $this['month'],
            'weight' => $this['weight'],
            'body_fat_percent' => $this['body_fat_percent']
        ];
    }
}
