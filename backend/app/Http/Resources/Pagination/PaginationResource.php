<?php

namespace App\Http\Resources\Pagination;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 */
class PaginationResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage()
        ];
    }
}
