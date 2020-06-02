<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SiteSetting;
use Faker\Generator as Faker;

$factory->define(SiteSetting::class, function (Faker $faker) {
    return [
        'key' => 'about',
        'value' => $faker->sentence(rand(50, 100))
    ];
});
