<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternCity extends Model
{
    use HasFactory;
    
    protected $table ="tblintern_cities";
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
    "transid","intern_code","city_code","city_desc","deleted","createuser",
    "createdate","modifydate","modifyuser"
    ];
}
