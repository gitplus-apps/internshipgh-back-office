<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
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
            "code"=> $this->sch_code,
            "description"=> $this->sch_desc,
            "website"=> $this->sch_website,
            "type"=> optional($this->type)->type_desc. " University",
            "sch_type" => $this->sch_type,
        ];
    }
}
