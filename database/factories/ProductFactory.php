<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Products;
use Faker\Generator as Faker;


$factory->define(Products::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'price' => $faker->randomDigitNotNull,
        'amount' => $faker->randomDigitNotNull,
        'sold' => $faker->randomDigitNotNull,
        'category_id' => $faker->numberBetween(1,5),
        'description' => $faker->realText($maxNBChars = 200 , $indexSize = 2)

    ];
});
