<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\ProductoEntrega::class, function (Faker $faker) {
    $products = \App\Models\Product::all();
    $entregas = \App\Models\Entrega::all();
    return [
        'product_id'=>$products->random(),
        'cantidad'=>$faker->randomNumber(2),
        'entrega_id'=>$entregas->random()
    ];
});
