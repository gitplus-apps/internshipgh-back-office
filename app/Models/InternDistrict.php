<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternDistrict extends Model
{
    use HasFactory;
    
    protected $table = "tblintern_district";
    
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","intern_code","district_code","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
    
}
