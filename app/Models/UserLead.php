<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLead extends Model
{
    use HasFactory;
    protected $table ='user_leads';
    protected $guarded=[];

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function Leads()
    {
        return $this->hasOne(Leads::class,'id','lead_id');
    }

}
