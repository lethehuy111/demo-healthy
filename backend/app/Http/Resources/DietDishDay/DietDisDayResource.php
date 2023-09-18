<?php

namespace App\Http\Resources\DietDishDay;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DietDisDayResource extends JsonResource
{
    public function toArray(Request $request): array
    {
//        dd($this->dish);
        return [
            'name_dish' => $this->dish ? $this->dish->name : '',
            'image' => $this->dish ? $this->dish->full_image: '',
            'date' => $this->date->format('m.d'),
            'diet_name' => isset($this->userDiet->diet) ? $this->userDiet->diet->name : ''
        ];
    }
}
