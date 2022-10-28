<?php

namespace App\Http\Resources;

use App\Models\Orders;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class OnCartShopsResource extends JsonResource
{

    private static $orderID, $isHired;

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
            'products' => OnCartProductsResource::orderCollection(
                $this->products->filter(function($product) {
                    return $product->orderDetails->where('orderID',
                        (self::$isHired == 0 && Auth::user()->customer) ? 
                            Auth::user()->customer->orders->where('status', 'on-cart')->first()->id : self::$orderID
                    )->count() > 0;
                })
            , self::$orderID, self::$isHired)
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
