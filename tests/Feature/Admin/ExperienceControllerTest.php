<?php

namespace Tests\Feature\Admin;

use App\Models\Experience;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExperienceControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Accessing admin experience create page
     */
    public function testAccessAdminIndexPage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.experience.index'));

        $response->assertSuccessful();

    }

    /**
     * Accessing admin experience create page
     */
    public function testAccessAdminCreatePage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.experience.create'));

        $response->assertSuccessful();

    }

    /**
     * Attempting to access the admin experience create page without being authenticated
     */
    public function testAccessingAdminTagCreatePageWithoutBeingAuthenticated()
    {
        $response = $this->get(route('admin.experience.create'));
        $response->assertStatus(302);
    }

    /**
     * Accessing admin experience edit page
     */
    public function testAccessAdminEditPage()
    {
        $user = factory(User::class)->create();
        $experience = factory(Experience::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.experience.edit', [$experience]));

        $response->assertSuccessful();

    }

    /**
     * Attempting to access the admin experience edit page without being authenticated
     */
    public function testAccessingAdminTagEditPageWithoutBeingAuthenticated()
    {
        $experience = factory(Experience::class)->create();
        $response = $this->get(route('admin.experience.edit', [$experience]));
        $response->assertStatus(302);
    }
}
