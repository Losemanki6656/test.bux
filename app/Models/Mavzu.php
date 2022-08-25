<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mavzu extends Model
{
    use HasFactory;

    
    public function tasks() 
     {
          return $this->hasMany(Task::class,'mavzu_id');
      }

      public function tema() 
      {
           return $this->belongsTo(Tema::class,'tema_id');
       }
}
