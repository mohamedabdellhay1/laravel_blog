<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "slug" => $this->slug,
            "description" => $this->description,
            "content" => $this->content,
            "categoryId" => $this->category_id,
            "userId" => $this->user_id,
            "time" => $this->time,
            "status" => $this->status,
            "deletedAt" => $this->deleted_at,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}