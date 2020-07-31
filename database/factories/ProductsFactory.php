<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    $departaments = \App\Models\Departament::all();
    return [
        'name'=>$faker->name,
        'image'=>$faker->image(),
        'stock'=>$faker->randomNumber(3),
        'min_stock'=>10,
        'departament_id'=>$departaments->random()
    ];
});
