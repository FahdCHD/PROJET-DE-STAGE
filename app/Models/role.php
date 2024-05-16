<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\FUsers;

class role extends Model
{
    protected $fillable = ["id_role","name_role"];
    public function fusers(){
        return $this->hasMany(FUsers::class,"role",'id_role');
    }
}
