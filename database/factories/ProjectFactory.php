<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use App\Models\Tag;
use App\Models\User;
use Faker\Generator as Faker;
use GrahamCampbell\Markdown\Facades\Markdown;

$factory->define(Project::class, function (Faker $faker) {
    $user = User::query()->first();

    $description = $faker->realText(200);

    return [
        'user_id' => $user->id,
        'title' => $faker->sentence,
        'summary' => $faker->sentence,
        'description' => $description,
        'markdown_description' => Markdown::convertToHtml($description),
        'cover' => "https://picsum.photos/1920/1080",
        'url' => $faker->url,
        'repo_url' => $faker->url
    ];
});

$factory->afterCreatingState(Project::class, 'withRecords', function (Project $project, Faker $faker) {
    $tags = collect();
    for ($i = 0; $i < rand(1, 5); $i++) {
        $tags->push(Tag::all()->random()->id);
    }
    $project->tags()->sync($tags);
});
