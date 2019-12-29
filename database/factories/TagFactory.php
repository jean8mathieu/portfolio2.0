<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $types = [Tag::TYPE_BACKEND, Tag::TYPE_FRONTEND, Tag::TYPE_DATABASE];
    return [
        'name' => $faker->word,
        'type' => $types[rand(0, sizeof($types) - 1)]
    ];
});
