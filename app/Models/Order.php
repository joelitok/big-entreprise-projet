<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $total;


    public function contents()
    {
        return $this->hasMany(Caddy::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
    
}
