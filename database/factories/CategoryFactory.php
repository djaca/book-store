<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->words(2, true),
        'slug' => $name
    ];
});