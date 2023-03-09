<?php

namespace App\Models;

use App\Task;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at',
    ];

//    protected $visible = [
//        'name',
//        'id',
//        'email'
//    ]; // Показывает исключительно эти поля

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function tasks()
    {
        return $this->hasMany(Task::class, 'owner_id');
    }

    public function tasksNew()
    {
        return $this->hasMany(Task::class, 'owner_id')->new();
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'owner_id')->withDefault(['name' => 'Нет компании']);
    }

    protected $appends = ['is_admin'];

    public function getIsAdminAttribute()
    {
        return (bool)rand(0, 1);
    }

    public function getIsManagerAttribute()
    {
        return (bool)rand(0, 1);
    }


}
