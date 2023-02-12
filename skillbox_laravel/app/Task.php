<?php

namespace App;

use App\Events\TaskCreated;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method static where(string $string, int|string|null $id)
 */
class Task extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

//   public $fillable = ['title', 'body', 'owner_id']; // снимает защиту с массивов
    public $guarded = [];

    protected $dispatchesEvents = [
        'created' => TaskCreated::class,
    ];

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    public function steps(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Step::class);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addStep($attributes): Model
    {
        return $this->steps()->create($attributes);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
