<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->words(rand(3,5),true),
        'description'=>$faker->text,
        'price'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2),
    ];
});
