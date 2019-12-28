<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    $user = factory(User::class)->create();

    return [
        'user_id' => $user->id,
        'title' => $faker->sentence,
        'summary' => $faker->paragraph,
        'description' => $faker->realText(200),
        'cover' => $faker->imageUrl(1920, 1080),
        'url' => $faker->url,
        'repo_url' => $faker->url
    ];
});

