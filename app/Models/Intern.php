<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;
    
    protected $table = "tblintern";
    protected $primaryKey = "transid";
    public $incrementing = false;
    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    
    protected $fillable = [
        "transid","intern_type","intern_code","school_code","fname","mname","lname",
        "whatsapp","prog_code",
        "qual_code","level_code","start_date","end_date","experience",
        "branch_desc","deleted","createuser",
        "createdate","modifyuser","modifydate"
    ];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','user_id');
    }
    
    public function region(){
        return $this->hasMany(InternRegion::class,'inern_code','intern_code');
    }
    
    public function district(){
        return $this->hasMany(InternDistrict::class,'intern_code','intern_code');
    }
    
    public function sectors(){
        return $this->hasMany(InternSector::class,'intern_code','intern_code');
    }
    
    
}
