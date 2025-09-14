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
            'model_type' => $this->model_type,
            'model_id' => $this->model_id,
            'desc' => $this->desc,
            'rate' => $this->rate,
            'is_featured' => $this->is_featured,
            'negative_points' => $this->negative_points,
            'positive_points' => $this->positive_points,
            'created_by' => UserResource::make($this->whenLoaded('createdBy')),
            'updated_by' => UserResource::make($this->whenLoaded('updatedBy')),
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
