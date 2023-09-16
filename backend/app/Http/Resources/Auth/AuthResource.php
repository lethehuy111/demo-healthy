<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'return' => true,
            'result' => [
                "id" => $this->id,
                "name" => $this->name,
                "email" => $this->email,
            ],
            'authorisation' => [
                'token' => $this->token
            ]
        ];
    }
}
