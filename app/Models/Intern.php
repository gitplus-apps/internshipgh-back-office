<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';
    public $incrementing = false;
    protected $table = "tblintern";
    protected $primaryKey = "intern_code";
    protected $fillable = [
        "transid", "intern_type", "intern_code", "school_code", "fname", "mname", "lname",
        "whatsapp", "prog_code", "user_code", "gender", "paid", "payment_reference",
        "qual_code", "level_code", "start_date", "end_date", "experience",
        "branch_desc", "deleted", "createuser",
        "createdate", "modifyuser", "modifydate"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_code', 'user_code');
    }
    
    public function school(){
        return $this->belongsTo(School::class, 'school_code', 'sch_code');
    }
    
    public function level(){
        return $this->belongsTo(Level::class, 'level_code', 'level_code');
    }
    
    public function region()
    {
        return $this->hasMany(InternRegion::class, 'intern_code', 'intern_code');
    }

    public function district()
    {
        return $this->hasMany(InternDistrict::class, 'intern_code', 'intern_code');
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class,"tblintern_sector","intern_code","sector_code");
    }

    public function qualification()
    {
        return $this->hasOne(Qualification::class, 'qual_code', 'qual_code');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, "intern_code", "intern_code");
    }
    
    public function type(){
        return $this->belongsTo(InternshipType::class, "intern_type","type_code");
    }
    
    public function program(){
        return $this->belongsTo(Programme::class,"prog_code","prog_code");
    }
}
