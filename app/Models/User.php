<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['active_roles', 'is_admin', 'role'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function isAdmin(): Attribute
    {
        return Attribute::make(get: fn () => $this->roles->pluck('name')->contains('admin'));
    }

    public function activeRoles(): Attribute
    {
        return Attribute::make(get: fn () => $this->roles->pluck('name')->implode(', '));
    }

    public function role(): Attribute
    {
        return Attribute::make(get: fn () => $this->roles->first()->name);
    }

    public function createdAt(): Attribute
    {
        return Attribute::get(fn ($value) => Carbon::parse($value)->format('Y-m-d'));
    }
}
