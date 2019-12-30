<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Project;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Accessing admin project create page
     */
    public function testAccessAdminCreatePage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.project.create'));

        $response->assertSuccessful();

    }

    /**
     * Attempting to access the admin project create page without being authenticated
     */
    public function testAccessingAdminProjectCreatePageWithoutBeingAuthenticated()
    {
        $response = $this->get(route('admin.project.create'));
        $response->assertStatus(302);
    }

    /**
     * Accessing admin project edit page
     */
    public function testAccessAdminEditPage()
    {
        $user = factory(User::class)->create();
        $project = factory(Project::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.project.edit', [$project]));

        $response->assertSuccessful();

    }

    /**
     * Attempting to access the admin project edit page without being authenticated
     */
    public function testAccessingAdminProjectEditPageWithoutBeingAuthenticated()
    {
        $response = $this->get(route('admin.project.edit', [$this->faker->numberBetween(0,500)]));
        $response->assertStatus(302);
    }
}
