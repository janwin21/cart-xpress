<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\UseUpload;

class ShopResource extends JsonResource
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
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country, 
            'email' => $this->email, 
            'postalCode' => $this->postalCode, 
            'phone' => $this->phone, 
            'addressLine1' => $this->addressLine1, 
            'addressLine2' => $this->addressLine2, 
            'backgroundImagePath' => 
                $this->getPath($this->backgroundImagePath, '/images/sample-shops/sample-shop-1.jpg'),
            'mainVendor' => new MainVendorResource($this->customer->user),
            'createdAt' => $this->created_at
        ];
    }

}
