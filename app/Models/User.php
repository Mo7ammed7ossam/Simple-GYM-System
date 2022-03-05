<?php

namespace App\Models;

use App\Models\Attendance;
use Cog\Laravel\Ban\Traits\Bannable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Ban\Bannable as BannableContract;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'gender',
        'national_id',
        'profile_img',
        'role_id',
        'role_type',
        'gym_id' ,
        'city_id'

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

    public function attendances(){

        return $this->hasMany(Attendance::class,'user_id');
    }
    public function boughtPackages()
    {
        return $this->hasMany(User::class,'user_id');
    }
}
