<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence,
      'content' => $faker->sentence,
      'image' => 'photo1.png',
      'date' => '08/10/20',
      'views' => $faker->numberBetween(0, 5000),
      'category_id' => 1,
      'user_id' => 1,
      'status' => 1,
      'is_featured' => 0
    ];
});
