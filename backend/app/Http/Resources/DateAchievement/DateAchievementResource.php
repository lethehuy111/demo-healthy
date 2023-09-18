<?php

namespace App\Http\Resources\DateAchievement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DateAchievementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'rate' => $this['rate'],
            'day' => $this['day']
        ];
    }
}
