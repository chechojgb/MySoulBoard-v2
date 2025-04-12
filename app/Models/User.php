<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\AreaRoleUser;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function areaRoles()
    {
        return $this->hasMany(AreaRoleUser::class);
    }
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles');
    }

    // Áreas a las que pertenece el usuario
    public function areas(): BelongsToMany
    {
        return $this->belongsToMany(Area::class);
    }

    // // ¿Tiene un rol específico?
    // public function hasRole(string $roleName): bool
    // {
    //     return $this->roles->contains('name', $roleName);
    // }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
