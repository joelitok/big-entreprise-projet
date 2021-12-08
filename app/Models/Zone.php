<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    public function quatars(){
        
        return $this->hasMany(Quatar::class);
    }

    public function city(){
    
        return $this->belongsTo(City::class);
    }
}
