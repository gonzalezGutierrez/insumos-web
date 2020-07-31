<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getUsers($like)
    {
        if($like)
            return $this->search($like);
        return $this->activos();
    }

    public function search($like)
    {
        return $this->activos()->where('name','LIKE',"%{$like}%");
    }

    public function activos()
    {
        return $this->where('status',0);
    }
}
