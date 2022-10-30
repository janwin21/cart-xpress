<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\UseUpload;

class ProductsInCategoryResource extends JsonResource
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
            'overallRating' => $this->reviews->count() > 0 ? round($this->reviews->avg('rating'), 1) : 5,
            'price' => $this->price,
            'discount' => $this->discount,
            'itemSold' => 15,
            'createdAt' => $this->created_at,
            'quantityInStock' => $this->quantityInStock,
            'imagePath' =>
                $this->getPath($this->imagePath, '/images/sample-products/product-1.jpg'),
            'shop' => $this->shop->id
        ];
    }
}
