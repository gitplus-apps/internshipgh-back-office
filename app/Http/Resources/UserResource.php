<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "transid"=> $this->transid,
            "user_code"=> $this->user_code,
            "email"=> $this->email,
            "username" => $this->username,
            "phone"=> $this->phone,
            "usertype" => $this->usertype,
            "createdate"=> $this->createdate,
        ];
    }
}
