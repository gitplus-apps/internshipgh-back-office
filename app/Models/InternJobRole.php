<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternJobRole extends Model
{
    use HasFactory;
    
    protected $table = "tblintern_jobroles";
    
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","intern_code","role_code","role_desc","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
}
