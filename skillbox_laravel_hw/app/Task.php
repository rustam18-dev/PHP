<?php

namespace App;

use App\Events\TaskCreated;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    use HasFactory;
    protected $factory = [];
//    public $fillable = ['title', 'body']; // снимает защиту с массивов
    public $guarded = [];

    protected $dispatchesEvents = [
        'created' => TaskCreated::class,
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addStep($attributes)
    {
        return $this->steps()->create($attributes);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
