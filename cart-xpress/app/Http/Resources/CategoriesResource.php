<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\UseUpload;

class CategoriesResource extends JsonResource
{
    use UseUpload;

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
            'name' => $this->name,
            'description' => $this->description,
            'imagePath' => 
                $this->getPath($this->backgroundImagePath, '/images/sample-shops/sample-shop-1.jpg'),
            'products' => ProductResource::collection($this->products)
        ];
    }
}
