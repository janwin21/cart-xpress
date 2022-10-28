<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Traits\UseUpload;

class YourProfileResource extends JsonResource
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
            'phone' => $this->phone,
            'email' => $this->email,
            'profileImagePath' => 
                $this->getPath($this->profileImagePath, '/images/alphabetical-profile/a-profile.jpg'),
            'backgroundImagePath' => 
                $this->getPath($this->backgroundImagePath, 
                '/images/alphabetical-backgrounds/a-profile-background.jpg'),
            'isHired' => $this->isHired,
            'isVendor' => $this->isVendor,
            'createAt' => $this->created_at
        ];
    }
    
}
