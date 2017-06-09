<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    public $fillable = ['nombre','registroable_id','registroable_type'];

    // Relación Eloquent
    public function registroable()
    {
    	return $this->morphTo();
    }
}
