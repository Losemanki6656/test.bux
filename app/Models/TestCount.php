<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCount extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'test_time'
    ];
  
}
