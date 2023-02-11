<?php

namespace App\Policies;

use App\Models\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Task $task
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Task $task): \Illuminate\Auth\Access\Response|bool
    {
        return $task->owner_id == $user->id;
    }
}