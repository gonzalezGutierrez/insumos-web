<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Departament::class, function (Faker $faker) {
    return [
        'area'=>$faker->name,
        'responsable'=>$faker->name
    ];
});
