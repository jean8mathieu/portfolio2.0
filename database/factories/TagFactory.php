<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $user = User::query()->first();

    if (!$user) {
        $user = factory(User::class)
            ->create();
    }

    $types = [Tag::TYPE_BACKEND, Tag::TYPE_FRONTEND, Tag::TYPE_DATABASE];
    return [
        'name' => $faker->word,
        'type' => $types[rand(0, sizeof($types) - 1)],
        'user_id' => $user->id
    ];
});
