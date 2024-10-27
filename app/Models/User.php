<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',       // Agrega role_id si cada usuario tiene un único rol
        'department_id', // Agrega department_id para asociar el usuario con un departamento
        'status'         // Agrega status para manejar el estado del usuario
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
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Define the relationship with Role (many-to-many).
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Define the relationship with Department (one-to-many).
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Define the relationship with Order (one-to-many).
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
