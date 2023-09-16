<?php

namespace App\Http\Resources\Profile;

use App\Globals\Constants;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
        {
            return [
                'return' => Constants::RESPONSE_SUCCESS,
                'result' => [
                    "id" => $this->id,
                    "name" => $this->name,
                    "email" => $this->email,
                ]
            ];
        }
}
