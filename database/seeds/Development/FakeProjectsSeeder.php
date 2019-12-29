<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class FakeProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, 10)
            ->state('withRecords')
            ->create();
    }
}
