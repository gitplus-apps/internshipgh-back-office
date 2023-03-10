<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    
    protected $table = "tblsector";
    protected $primaryKey = "sector_code";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","sector_code","sector_desc","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
}
