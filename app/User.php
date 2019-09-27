<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class)->with(['answers', 'user']);
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }

    /**
     * Проверка на наличие у юзера одной из переданных ролей
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return $this->roles()->whereIn('name', $roles)->first() !== null;
    }

    /**
     * проверка на наличие у юзера переданной роли
     * @param string $role
     */
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->first() !== null;
    }
}
