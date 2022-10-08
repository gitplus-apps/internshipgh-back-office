<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;
    
    protected $table ="tbluser_type";
    protected $primaryKey = "user_code";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    
    protected $fillable = [
    "transid","user_code","user_desc","deleted",
    "createuser","createdate","modifyuser","modifydate"
    ];
    
    public function user(){
        return $this->hasMany(User::class,"user_code","user_type");
    }
    
    
}
