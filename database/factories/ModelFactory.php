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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'status' => $faker-> randomElement($array = array ('premium', 'free')),
    ];
});

$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Sermon::class, function (Faker\Generator $faker, $factory) {
    return [

        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'preacher' => $faker->name($gender = null|'male'|'female'),
        'service_id' => '2',
        'category_id' => '93',
        'datepreached' => $faker->date($format = 'Y-m-d', $max = 'now'),        
        'month' => $faker->monthName($max = 'now'),
        'year' => $faker->year,
        'status' => $faker-> randomElement($array = array ('free','premium')),

    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [

        /*'name' => $faker-> randomElement($array = array ('celebration2','Success and motivation2', 'grace and favour2', 'invited guests2')),*/
        'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'info' => $faker->sentence($nbWords = 20, $variableNbWords = true),

    ];
});

$factory->define(App\Service::class, function (Faker\Generator $faker) {
    return [

        /*'name' => $faker-> randomElement($array = array ('celebration2','Success and motivation2', 'grace and favour2', 'invited guests2')),*/
/*        'name' => $faker->word,*/
        'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'info' => $faker->sentence($nbWords = 20, $variableNbWords = true),

    ];
});


