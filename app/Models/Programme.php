<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;
    
    
    protected $table = "tblprog";
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","prog_code","prog_desc","sch_code","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
    
    public function school(){
       return $this->belongsTo(School::class,'sch_code','sch_code');
    }
    
    
}
