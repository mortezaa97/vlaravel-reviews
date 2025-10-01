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
            'name' => $this->name,
            'cellphone' => $this->cellphone,
            'email' => $this->email,
            'reviewable' => ReviewableResource::make($this->whenLoaded('reviewable')),
            'is_featured' => $this->is_featured,
            'negative_points' => $this->negative_points,
            'positive_points' => $this->positive_points,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'children' => self::collection($this->whenLoaded('children')),
            'parent' => self::make($this->whenLoaded('parent')),
            'root' => self::make($this->whenLoaded('root')),
            'created_by' => UserResource::make($this->whenLoaded('createdBy')),
            'updated_by' => UserResource::make($this->whenLoaded('updatedBy')),
        ];
    }
}
