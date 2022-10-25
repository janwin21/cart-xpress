<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\UseUpload;

class CategoriesWithProductsResource extends JsonResource
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
            'imagePath' => 
                $this->getPath($this->backgroundImagePath, '/images/sample-shops/sample-shop-1.jpg'),
            'products' => ProductsInCategoryResource::collection($this->products)
        ];
    }
}
