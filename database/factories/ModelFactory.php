<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'password'          => $password ?: $password = bcrypt('secret'),
        'phone'             => $faker->phoneNumber,
        'gender'            => 0,
        'sexual_preference' => 0,
        'personality_type'  => 0,
        'age'               => 0,
        'city'              => 0
   ];
});

$factory->defineAs(App\Models\User::class, 'male', function ($faker) use ($factory) {
   $user = $factory->raw('App\Models\User');

   return array_merge($user, [
       'first_name'     => $faker->firstNameMale
   ]);
});

$factory->defineAs(App\Models\User::class, 'female', function ($faker) use ($factory) {
    $user = $factory->raw('App\Models\User');

    return array_merge($user, [
        'first_name'     => $faker->firstNameFemale
    ]);
});

$factory->define(App\Models\Preference::class, function (Faker $faker) {
    $config = Config::get('constants');
    $weight = $config['importance_value'];
    return [
        'personality_type'      => $faker->numberBetween(0, 2),
        'personality_weight'    => $weight[$faker->numberBetween(0, 4)],
        'age'                   => $faker->numberBetween(0, 2),
        'age_weight'            => $weight[$faker->numberBetween(0, 4)],
        'city'                  => $faker->numberBetween(0, 9),
        'city_weight'           => $weight[$faker->numberBetween(0, 4)]
    ];
});
