<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Faker\Generator as Faker;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Str;

$factory->define(Blog::class, function (Faker $faker) {
    $user = User::query()->first();

    $description = $faker->paragraphs(rand(1, 4));
    $description = implode("\n\n", $description);

    $title = $faker->sentence;
    $slug = Str::kebab($title);

    return [
        'user_id' => $user->id,
        'title' => $title,
        'slug' => $slug,
        'summary' => $faker->sentence,
        'description' => $description,
        'markdown_description' => Markdown::convertToHtml($description),
        'cover' => "https://picsum.photos/1920/1080",
    ];
});

$factory->afterCreatingState(Blog::class, 'withRecords', function (Blog $project, Faker $faker) {
    $tags = collect();
    for ($i = 0; $i < rand(1, 5); $i++) {
        $tags->push(Tag::all()->random()->id);
    }
    $project->tags()->sync($tags);
});
