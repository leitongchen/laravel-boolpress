<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'slug' => $faker->slug(),
        'content' => $faker->realText($maxNbChars = 2000, $indexSize = 2),
        'src' => 'https://source.unsplash.com/random',
        'user_id' => 1,
        'category_id' => 2,
    ];
});
