<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FakeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'username' => "Developer",
            'email' => 'developer@test.test'
        ]);
    }
}
