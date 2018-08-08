<?php

use Faker\Generator as Faker;

$factory->define(\App\Products::class, function (Faker $faker) {
    return [
        'name'=>$faker->text(rand(6,12)),
        'description'=>$faker->text(rand(40,100)),
        'sku'=> $faker->numberBetween(1000,10000),
        'price'=>$faker->numberBetween(99,9999)
    ];
});
