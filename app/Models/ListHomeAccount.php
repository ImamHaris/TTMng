<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListHomeAccount extends Model
{
    use HasFactory;
    protected $table = 'list_home_account';
    protected $guarded=[
        'id'
    ];
}
