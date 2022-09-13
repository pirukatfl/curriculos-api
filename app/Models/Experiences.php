<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'date_in',
        'date_out',
        'current_job',
        'office',
        'office_description',
        'working_time_on_job',
    ];
}
