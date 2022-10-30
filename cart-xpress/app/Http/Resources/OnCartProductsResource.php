<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\UseUpload;

class OnCartProductsResource extends JsonResource
{
    use UseUpload;

    private static $orderID, $isHired;
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $orderDetail = $this->orderDetails->where('productID', $this->id)->where('orderID',
            (self::$isHired == 0 && Auth::user()->customer) ?
                Auth::user()->customer->orders->where('status', 'on-cart')->first()->id : self::$orderID
        )->first();

        $quantityOrdered = isset($orderDetail) ? $orderDetail->quantityOrdered : 0;
        $orderID = isset($orderDetail) ? $orderDetail->orderID : 0;
        $productID = isset($orderDetail) ? $orderDetail->productID : 0;

        $imagePath = '/images/sample-products/product-1.jpg';

        if(str_contains($this->imagePath, 'source.unsplash.com')) $imagePath = $this->imagePath;
        else if(self::$isHired) $imagePath = '../' . $this->imagePath;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'createdAt' => $this->created_at,
            'price' => $this->price,
            'size' => $this->size,
            'discount' => $this->discount,
            'durationOfDeliveryByHour' => $this->durationOfDeliveryByHour,
            'quantityInStock' => $this->quantityInStock,
            'imagePath' => $imagePath,
            'overallRating' => 5,
            'countReviews' => 5,
            'totalPriceSold' => 5,
            'category' => new TopCategoriesResource($this->category),
            'shop' => new ShopResource($this->shop),
            'orderDetails' => [
                'orderID' => $orderID,
                'productID' => $productID,
                'quantityOrdered' => $quantityOrdered
            ]
            
        ];

    }

    // custom function that returns collection type
    public static function orderCollection($resource, $orderID, $isHired): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        self::$orderID = $orderID;
        self::$isHired = $isHired;
        return parent::collection($resource);
    }
}
