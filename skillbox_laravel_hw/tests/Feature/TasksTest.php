<?php

namespace Tests\Feature;

use App\Models\User;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAUserCanCreateATask()
    {
        $this->withExceptionHandling();

        // Что, входные данные: Авторизованный пользователь
        $this->actingAs($user = User::factory()->create());
        // Когда: Приходим на страницу /tasks для создания новой задачи, передавая необходимые данные
        $attributes = Task::factory()->raw(['owner_id' => $user]);
        $this->post('/tasks', $attributes);
        // Что в итоге: Запись в БД о новой задаче
        $this->assertDatabaseHas('tasks', $attributes);


    }

    public function testGuestMayNotCreateATask()
    {
        $this->post('/tasks', [])->assertRedirect('/login');
    }
}
