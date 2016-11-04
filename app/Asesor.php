<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    protected $table = 'asesores';
    public $fillable = ['nombre','email','password','rol_id'];
}
