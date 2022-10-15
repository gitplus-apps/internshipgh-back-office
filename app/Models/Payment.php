<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    const CREATED_AT = 'createdate';
    const UPDATED_AT = 'modifydate';

    public $incrementing = false;
    protected $table = "tblpayment";
    protected $primaryKey = "transid";

    protected $fillable = [
        "transid", "intern_code", "payment_reference",
        "charged_date", "paid_date", "meta_data", "deleted",
        "createuser", "createdate", "modifyuser", "modifydate",
    ];

    public function intern()
    {
        return $this->belongsTo(Intern::class, "intern_code", "intern_code");
    }

}
