<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ReviewsResource extends JsonResource
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
            'id' => $this->id,
            'createdBy' => new YourProfileResource($this->user),
            'postedAt' => $this->created_at,
            'rating' => $this->rating,
            'content' => $this->content,
            'replies' => RepliesResource::collection($this->replies),
            'owned' => $this->user->id == Auth::user()->id
        ];
    }
}
