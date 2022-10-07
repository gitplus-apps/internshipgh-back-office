<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
    use HasFactory;
    protected $table = "tbljobroles";
    protected $primaryKey = "id";
    public $incrementing = true;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","role_code","role_desc","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];

}
