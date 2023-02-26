<?php

namespace Database\Seeders;

use App\Models\User;
use App\Step;
use App\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksToUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create(['email' => 'user1@gmail.com', 'password' => \Hash::make('123')]);

        Task::factory(5)->create([
            'owner_id' => $user,
        ])->each(function (Task $task) {
            $task->steps()->saveMany(Step::factory(rand(1, 5))->make(['task_id' => '']));
        });
    }
}
