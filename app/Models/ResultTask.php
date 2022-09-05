<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultTask extends Model
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

      public function task() 
     {
          return $this->belongsTo(Task::class);
      }

      public function startMavzu() 
     {
          return $this->belongsTo(StartMavzu::class,'start_mavzu_id');
      }
}
