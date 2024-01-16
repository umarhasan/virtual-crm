<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function client()
    {
        return $this->hasOne(\App\Models\Client::class,'id','client_id');
    }

    public function leads()
    {
        return $this->hasOne(\App\Models\Leads::class,'id','lead_id');
    }
}
