<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Accessing admin home page
     */
    public function testAccessAdminHomePage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.home.index'));

        $response->assertSuccessful();

    }

    /**
     * Attempting to access the admin home page without being authenticated
     */
    public function testAccessingAdminHomePageWithoutBeingAuthenticated()
    {
        $response = $this->get(route('admin.home.index'));
        $response->assertStatus(302);
    }
}
