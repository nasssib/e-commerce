<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Products::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'image' =>'uploads/products/p1.png',
        'price' => $faker->numberBetween(2500,9000),
        'description' => $faker->paragraph(4),
    ];
});
