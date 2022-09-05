<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartMavzu extends Model
{
    use HasFactory;

    public function user() 
    {
         return $this->belongsTo(User::class);
     }

     public function mavzu() 
    {
         return $this->belongsTo(Mavzu::class,'mavzu_id');
     }
}
