<?php

namespace App;

use App\Events\TaskCreated;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;


class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
//    public $fillable = ['title', 'body']; // снимает защиту с массивов
    public $guarded = [];

    protected $dispatchesEvents = [
        'created' => TaskCreated::class,
    ];

    protected $attributes = [
        'type' => 'new'
    ];

    protected $dates = [
        'viewed_at'
    ];

    protected $casts = [
        'completed' => 'boolean',
        'options' => 'array',
        'viewed_at' => 'datetime:Y.m.d',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function (Task $task) {
            $after = $task->getDirty();
            $task->history()->attach(auth()->id(), [
                'before' => json_encode(Arr::only($task->fresh()->toArray(), array_keys($after))),
                'after' => json_encode($after),
            ]);
        });
    }



//    protected static function boot()
//    {
//        parent::boot();
//        static::addGlobalScope('onlyImportant', function (Builder $builder) {
//            $builder->where('type', 'old');
//        });
//    }

    public function getTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDoubleTypeAttribute()
    {
        return str_repeat($this->type, 2);
    }

    protected $appends = [
        'double_type'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeNew($query)
    {
        return $query->ofType('new');
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

    public function history()
    {
        return $this->belongsToMany(User::class, 'task_histories')
            ->withPivot(['before', 'after'])->withTimestamps();
    }
}
