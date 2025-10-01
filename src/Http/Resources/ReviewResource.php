<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'desc' => $this->desc,
            'rate' => $this->rate,
            'reviewable' => new ReviewableResource($this->reviewable),
            'is_featured' => $this->is_featured,
            'negative_points' => $this->negative_points,
            'positive_points' => $this->positive_points,
            'created_by' => UserResource::make($this->whenLoaded('createdBy')),
            'updated_by' => UserResource::make($this->whenLoaded('updatedBy')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
