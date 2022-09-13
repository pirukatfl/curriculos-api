<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Courses;

$cou = Courses::all();

foreach ($cou as $role) {
    // echo $role->pivot->created_at;
}

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity
    protected $fillable = [
        'email',
        'password',
        'permission_id'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'user' => [
                'id' => $this->id,
                'email' => $this->email,
                'permission_id' => $this->permission_id,
            ]
        ];
    }

    public function permission()
    {
        return $this->hasOne(Permissions::class, 'id', 'permission_id');
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function address()
    {
        return $this->hasOne(Addresses::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contacts::class);
    }
    public function courses()
    {
        return $this->hasMany(Courses::class);
    }
    public function experiences()
    {
        return $this->hasMany(Experiences::class);
    }
    public function schoolings()
    {
        return $this->hasMany(Schooling::class);
    }

    public function image() {
        return $this->hasOne(Images::class);
    }
}
