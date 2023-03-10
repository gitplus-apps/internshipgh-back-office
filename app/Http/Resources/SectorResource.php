<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectorResource extends JsonResource
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
            "code" => $this->sector_code,
            "description"=> $this->sector_desc,
            "createdate"=> $this->createdate,
            
        ];
    }
}
