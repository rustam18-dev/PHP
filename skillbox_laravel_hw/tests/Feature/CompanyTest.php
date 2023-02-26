<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function testAUserCanCreateCompany()
    {
        $this->withExceptionHandling();

        $this->actingAs($user = User::factory()->create());

        $this->post('/companies', $attributes = ['name' => 'Qsoft']);

        $this->assertDatabaseHas('companies', $attributes);
    }

    public function testItRequiresNameOnCreate()
    {
        $this->actingAs($user = User::factory()->create());

        $this->post('/companies', [])->assertSessionHasErrors(['name']);

    }

    public function testGuestMayNotCreateACompany()
    {
        $this->post('/companies', [])->assertRedirect('/login');
    }
}
