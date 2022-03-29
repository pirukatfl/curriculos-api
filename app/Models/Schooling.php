<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schooling extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institution_name',
        'date_in',
        'date_out',
        'level_education',
        'finished',
    ];
}
