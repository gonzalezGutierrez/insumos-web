<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Entrega::class, function (Faker $faker) {
    $departaments = \App\Models\Departament::all();
    return [
        'departament_id'=>$departaments->random(),
        'user_id'=>1,
        'estatus'=>'terminado'
    ];
});
