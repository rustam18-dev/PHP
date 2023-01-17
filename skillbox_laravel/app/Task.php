<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Task extends Model
{
    use HasFactory;
    public $fillable = ['title', 'body']; // снимает защиту с массивов


    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
}
