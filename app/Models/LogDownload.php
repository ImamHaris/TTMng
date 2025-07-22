<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogDownload extends Model
{
    use HasFactory;
    protected $table = 'log_download';
    protected $guarded=[
        'id'
    ];
}
