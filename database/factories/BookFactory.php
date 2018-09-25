<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->words(3, true)),
        'category_id' => function () {
            return factory(\App\Category::class)->create()->id;
        },
        'description' => $faker->text(800),
        'isbn' => $faker->isbn13,
        'price' => $faker->randomFloat(2, 5, 50),
        'in_stock' => $faker->randomNumber(2),
        'img' => 'https://via.placeholder.com/480x640'
    ];
});
