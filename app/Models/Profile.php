<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'biography',
        'age',
        'gender',
        'birth_date',
        'cpf_cnpj',
        'cnh_categories',
    ];

    public function image() {
        return $this->hasOne(Images::class);
    }
}
