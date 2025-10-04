<?php

declare(strict_types=1);

namespace Mortezaa97\Reviews\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->when($this->id !== null, fn () => $this->id),
            'title' => $this->when($this->title !== null, fn () => $this->title),
            'slug' => $this->when($this->slug !== null, fn () => $this->slug),
            'code' => $this->when($this->code !== null, fn () => $this->code),
            'name' => $this->when($this->name !== null, fn () => $this->name),
            'price' => $this->when($this->price !== null, fn () => $this->price),
            'rate' => $this->when($this->rate !== null, fn () => $this->rate),
        ];
    }
}
