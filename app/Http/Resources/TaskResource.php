<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "userId" => $this->user_id,
            "description"=> $this->description,
            "status"=> $this->status,
            "createdAt" => $this->created_at->diffForHumans(),
            "editedAt"=> $this->updated_at->diffForHumans(),
        ];
    }
}
