<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'province',
        'lastname',
        'phone',
        'fiscalcode' // lo avevamo dimenticato
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // QUALUNQUE CAMPO ‘NON VOGLIAMO RITORNARE’, BASTA METTERLO NEL CAMPO '$hidden':
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // PER CASTARE IL ‘CASTARE’ EMAIL NEL FORMATO 'datetime':
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
