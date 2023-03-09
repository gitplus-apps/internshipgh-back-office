<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\InternSectorResource;

class InternResource extends JsonResource
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
            "code"=> $this->intern_code,
            "intern_type"=> $this->intern_type,
            "intern_type_desc"=> $this->type->type_desc,
            "gender"=> $this->gender,
            "school_code"=> $this->school_code,
            "school_name"=> $this->school->sch_desc,
            "phone"=> $this->phone,
            "whatsapp"=> $this->whatsapp,
            "email"=> $this->email,
            "fname"=> $this->fname,
            "mname"=> $this->mname,
            "lname"=> $this->lname,
            "prog_code"=> $this->prog_code,
            "prog_desc"=> $this->program->prog_desc,
            "qual_code"=> $this->qual_code,
            "qual_desc"=> $this->qualification->qual_desc,
            "level_code"=> $this->level_code,
            "level_desc"=> $this->level->level_desc,
            "experience"=> $this->experience,
            "start_date"=> $this->start_date,
            "end_date"=> $this->end_date,
            "sectors" => $this->sectors,
            
        ];
    }
}
