<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternSector extends Model
{
    use HasFactory;
    
    protected $table = "tblintern_sector";
    
    protected $primaryKey = "sector_code";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","intern_code","sector_code","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
}
