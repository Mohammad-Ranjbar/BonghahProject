<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Banner;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'verified' => true ,
        'password' => bcrypt(str_random(10)), // password
        'remember_token' => Str::random(10),
    ];

});

$factory->define(Banner::class, function (Faker $faker) {
    return [
       'street'         =>$faker->streetAddress,
        'city'          =>$faker->city,
        'zip'           =>$faker->postcode,
        'state'         =>$faker->state,
        'country'       =>$faker->country,
        'price'         =>$faker->numberBetween(10000,50000),
        'description'   =>$faker->paragraph(3,true)
    ];

});
