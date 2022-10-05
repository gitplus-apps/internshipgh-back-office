<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    
    protected $table = "tbldistrict";
    protected $primaryKey = "code";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "code","name","region","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
}
