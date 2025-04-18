<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user' => ProfileResource::make($this->user->profile),
            'image' => ImageResource::make($this->image),
            'description' => $this->description,
        ];
    }
}
