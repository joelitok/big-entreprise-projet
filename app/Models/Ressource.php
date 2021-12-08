<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    public $exist = false;

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
}
