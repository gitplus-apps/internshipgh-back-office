<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipType extends Model
{
    use HasFactory;
    
    protected $table = "tblintership_type";
    
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","type_code","type_desc","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
    
}
