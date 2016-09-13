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

$factory->define(App\Models\Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->text,
        'position' => 'page',
    ];
});