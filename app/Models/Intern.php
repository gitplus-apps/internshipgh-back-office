<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;
    
    protected $table = "tblintern";
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","intern_code","school_code","fname","mname","lname",
        "branch_desc","source","import","export","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
    
    
}
