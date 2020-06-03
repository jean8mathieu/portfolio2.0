<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * Check to see if a guest can see the log in page
     */
    public function testGuestCanSeeLogin()
    {
        $this->get(route('login'))
            ->assertSuccessful()
            ->assertViewIs('auth.login');
    }

    /**
     * Check to see if a guest can log in with correct information
     */
    public function testGuestCanLogin()
    {
        $password = $this->faker->password;
        $user = factory(User::class)
            ->create([
                'password' => Hash::make($password)
            ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => $password
        ]);

        $this->assertTrue(Auth::check());

        $this->assertAuthenticatedAs($user);
    }

    /**
     * Check if an authenticated user can see the log in page
     */
    public function testUserCannotSeeLogin()
    {
        $user = factory(User::class)
            ->create();

        $this->actingAs($user)
            ->get(route('login'))
            ->assertRedirect();
    }

    /**
     * Check if a guest can authenticate with invalid password
     */
    public function testGuestCannotLoginWithInvalidPassword()
    {
        $user = factory(User::class)
            ->create();

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => $this->faker->password
        ])->assertSessionHasErrors('email');

        $this->assertGuest();

        $this->assertNotTrue(Auth::check());
    }

    /**
     * Guest cannot log in with invalid email
     */
    public function testGuestCannotLoginWithInvalidEmail()
    {
        $password = $this->faker->password;
        $user = factory(User::class)
            ->create([
                'password' => $password
            ]);

        $this->post(route('login'), [
            'email' => $this->faker->email,
            'password' => $password
        ])->assertSessionHasErrors('email');

        $this->assertGuest();

        $this->assertNotTrue(Auth::check());
    }
}
