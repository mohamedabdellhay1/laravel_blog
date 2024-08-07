<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            "name" => $this->name,
            "slug" => $this->slug,
            "status" => $this->status,
            "parentId" => $this->parent_id,
            "createdBy" => $this->created_by,
            "updatedBy" => $this->updated_by,
            "deletedAt" => $this->deleted_at,
            "deletedBy" => $this->deleted_by,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}