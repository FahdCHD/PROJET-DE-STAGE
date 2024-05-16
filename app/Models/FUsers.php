<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\role;

class FUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","email","password","role"
    ];
    public function role(){
        return $this->belongsTo(role::class,"role",'id_role');
    }
}
