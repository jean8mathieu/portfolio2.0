<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Experience;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Experience::class, function (Faker $faker) {

    $description = $faker->sentence(rand(50, 200));

    $start = Carbon::now()->subYears(rand(0, 5))->subMonths(rand(0, 12))->subDays(rand(0, 31));
    do {
        $end = Carbon::now()->subYears(rand(0, 5))->subMonths(rand(0, 12))->subDays(rand(0, 31));
    } while ($start >= $end);

    return [
        'position' => $faker->jobTitle,
        'company_name' => $faker->company,
        'started_at' => $start,
        'ended_at' => $end,
        'location' => $faker->city,
        'description' => $description,
        'markdown_description' => $description,
    ];
});
