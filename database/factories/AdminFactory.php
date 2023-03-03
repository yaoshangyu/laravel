<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'password' => bcrypt('123'),
        'sex' =>1,
        'depart_id'=>mt_rand(1,5),
        'create_time'=>date('Y-m-d H:i:s'),
        'update_time'=>date('Y-m-d H:i:s'),
        'desc'=>Str::random(10)

    ];
});
