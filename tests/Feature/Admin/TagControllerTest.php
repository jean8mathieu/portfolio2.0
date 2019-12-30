<?php

namespace Tests\Feature\Admin;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Accessing admin tag create page
     */
    public function testAccessAdminCreatePage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.tag.create'));

        $response->assertSuccessful();

    }

    /**
     * Attempting to access the admin tag create page without being authenticated
     */
    public function testAccessingAdminTagCreatePageWithoutBeingAuthenticated()
    {
        $response = $this->get(route('admin.tag.create'));
        $response->assertStatus(302);
    }

    /**
     * Accessing admin tag edit page
     */
    public function testAccessAdminEditPage()
    {
        $user = factory(User::class)->create();
        $tag = factory(Tag::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.tag.edit', [$tag]));

        $response->assertSuccessful();

    }

    /**
     * Attempting to access the admin tag edit page without being authenticated
     */
    public function testAccessingAdminTagEditPageWithoutBeingAuthenticated()
    {
        $tag = factory(Tag::class)->create();
        $response = $this->get(route('admin.tag.edit', [$tag]));
        $response->assertStatus(302);
    }
}
