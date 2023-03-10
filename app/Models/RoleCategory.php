<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleCategory extends Model
{
    use HasFactory;
    protected $table = "tblroles_cat";
    
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","role_code","role_desc","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
}
