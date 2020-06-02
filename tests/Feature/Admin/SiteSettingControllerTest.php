<?php

namespace Tests\Feature\Admin;

use App\Models\SiteSetting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiteSettingControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Accessing admin setting index page
     */
    public function testAccessAdminIndexPage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.setting.index'));

        $response->assertSuccessful();

    }

    /**
     * Accessing admin setting create page
     */
    public function testAccessAdminCreatePage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.setting.create'));

        $response->assertSuccessful();

    }

    /**
     * Attempting to access the admin setting create page without being authenticated
     */
    public function testAccessingAdminTagCreatePageWithoutBeingAuthenticated()
    {
        $response = $this->get(route('admin.setting.create'));
        $response->assertStatus(302);
    }

    /**
     * Accessing admin setting edit page
     */
    public function testAccessAdminEditPage()
    {
        $user = factory(User::class)->create();
        $setting = factory(SiteSetting::class)->create();
        $response = $this->actingAs($user)
            ->get(route('admin.setting.edit', [$setting]));

        $response->assertSuccessful();

    }

    /**
     * Attempting to access the admin setting edit page without being authenticated
     */
    public function testAccessingAdminTagEditPageWithoutBeingAuthenticated()
    {
        $setting = factory(SiteSetting::class)->create();
        $response = $this->get(route('admin.setting.edit', [$setting]));
        $response->assertStatus(302);
    }
}
