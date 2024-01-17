<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    protected $table ='packages';
    protected $guarded=[];

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
