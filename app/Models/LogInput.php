<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogInput extends Model
{
    use HasFactory;
    protected $table = 'log_input';
    protected $guarded=[
        'id'
    ];
}
