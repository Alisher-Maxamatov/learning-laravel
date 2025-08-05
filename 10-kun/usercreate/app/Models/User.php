<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts =[
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function isAdmin()
    {
        return $this->role=='admin';
    }
    public function isModerator()
    {
        return $this->role=='moderator';
    }
    public function isUser()
    {
        return $this->role=='user';
    }
}
