<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    public $fillable = ['nombre','email','password','direccion','user_id','ciudad_id'];
}
