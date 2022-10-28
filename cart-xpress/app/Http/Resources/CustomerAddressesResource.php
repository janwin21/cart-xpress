<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\UseUpload;

class CustomerAddressesResource extends JsonResource
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
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'profileImagePath' => 
                $this->getPath($this->profileImagePath, '/images/alphabetical-profile/a-profile.jpg'),
            'backgroundImagePath' => 
                $this->getPath($this->backgroundImagePath, 
                '/images/alphabetical-backgrounds/a-profile-background.jpg'),
            'addressLine1' =>  isset($this->customer->addressLine1) ? $this->customer->addressLine1 : '',
            'addressLine2' =>  isset($this->customer->addressLine2) ? $this->customer->addressLine2 : '',
            'city' =>  isset($this->customer->city) ? $this->customer->city : '',
            'state' =>  isset($this->customer->state) ? $this->customer->state : '',
            'postalCode' =>  isset($this->customer->postalCode) ? $this->customer->postalCode : '',
            'country' =>  isset($this->customer->country) ? $this->customer->country : '',
            'orders' => [ 'comment' => '' ]
        ];
    }
}
