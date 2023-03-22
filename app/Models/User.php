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

    public function topics(){
        return $this->hasMany(Topic::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function likes(){
        return $this->belongsToMany(Reply::class,'likes');
    }

    public function user_roles(){
        return $this->belongsToMany(Role::class,'user_roles');
    }

    public function is_Admin(){
        return $this->has_Role('admin');
    }

    public function has_Role(string $role){

        if($this->user_roles()->where('name',$role)->first()){
            return true;
        }
        return false;

    }
}
