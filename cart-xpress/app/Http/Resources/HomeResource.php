<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
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
            'popularShops' => [
                [ 'id'=> 0, 'backgroundImagePath' => '/images/sample-shops/sample-shop-2.jpg'],
                [ 'id'=> 1, 'backgroundImagePath' => '/images/sample-shops/sample-shop-3.webp'],
                [ 'id'=> 2, 'backgroundImagePath' => '/images/sample-shops/sample-shop-1.jpg']
            ]
        ];
    }
}
