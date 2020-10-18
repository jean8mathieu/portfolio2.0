<?php

use App\Models\Blog;
use Illuminate\Database\Seeder;

class FakeBlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Blog::class, 10)
            ->state('withRecords')
            ->create();
    }
}
