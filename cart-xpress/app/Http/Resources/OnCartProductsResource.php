<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\UseUpload;

class OnCartProductsResource extends JsonResource
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
            'createdAt' => $this->created_at,
            'price' => $this->price,
            'size' => $this->size,
            'discount' => $this->discount,
            'durationOfDeliveryByHour' => $this->durationOfDeliveryByHour,
            'quantityInStock' => $this->quantityInStock,
            'imagePath' => 
                $this->getPath($this->imagePath, '/images/sample-products/product-1.jpg'),
            'overallRating' => 5,
            'countReviews' => 5,
            'totalPriceSold' => 5,
            'category' => new TopCategoriesResource($this->category),
            'shop' => new ShopResource($this->shop),
            'orderDetails' => [
                'quantityOrdered' => $this->orderDetails->where('orderID',
                    Auth::user()->customer->orders->where('status', 'on-cart')->first()->id
                )->first()->quantityOrdered
            ]
        ];
    }
}
