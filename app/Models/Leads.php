<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Source()
    {
        return $this->hasOne(LeadSources::class,'id','source');
    }

    public function Status()
    {
        return $this->hasOne(LeadStatus::class,'id','status');
    }

    public function LeadsUser()
    {
        return $this->hasOne(UserLead::class,'lead_id','id');
    }

}
