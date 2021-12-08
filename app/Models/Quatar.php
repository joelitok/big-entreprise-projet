<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quatar extends Model
{
    use HasFactory;
    public function city(){
        
        return $this->belongsTo(City::class);
    }

    public function zone(){

        return $this->belongsTo(Zone::class);
    }
}
