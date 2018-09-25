<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'description' => $faker->text(400),
        'isbn' => $faker->isbn13,
        'price' => $faker->randomFloat(2, 5, 50),
        'in_stock' => $faker->randomNumber(2),
        'img' => $faker->imageUrl()
    ];
});
