<?php

namespace App\Http\Resources;

use App\Globals\Constants;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ErrorResource extends JsonResource
{
    public $error;
    public $message;

    public function __construct(mixed $message, int $code)
    {
        $this->error = $code;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray(Request $request): array|JsonSerializable|Arrayable
    {
        return [
            'return' => Constants::RESPONSE_FAIL,
            'result' => [
                $this->mergeWhen(isset($this->error), ['error' => $this->error]),
                'message' => $this->message
            ]
        ];
    }
}
