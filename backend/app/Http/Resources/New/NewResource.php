<?php

namespace App\Http\Resources\New;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => compact_title($this->title),
            'date' => $this->updated_at->format('y.m.d h:i'),
            'image' => $this->full_image,
            'tags' => $this->tags
        ];
    }
}
