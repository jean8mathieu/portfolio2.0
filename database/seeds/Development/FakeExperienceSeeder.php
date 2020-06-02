<?php

use App\Models\Experience;
use Illuminate\Database\Seeder;

class FakeExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Experience::class, rand(3, 10))
            ->create();
    }
}
