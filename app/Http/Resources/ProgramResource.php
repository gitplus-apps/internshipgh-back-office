<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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
            "transid" => $this->transid,
            "code"=> $this->prog_code,
            "prog_desc"=> $this->prog_desc,
            "sch_code"=> $this->sch_code,
            "school"=> optional($this->school)->sch_desc,
        ];
    }
}
