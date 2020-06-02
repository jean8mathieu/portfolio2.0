<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('migrate:refresh');
        $this->call(FakeUsersSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(FakeProjectsSeeder::class);
        $this->call(FakeSiteSettingSeeder::class);
        $this->call(FakeExperienceSeeder::class);
    }
}
