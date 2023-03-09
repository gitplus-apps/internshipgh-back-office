<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    
    protected $table = "tblschool";
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","sch_code","sch_desc","sch_type","sch_website","sch_bio","sch_phone","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
}
