<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdminAddress;
use Faker\Generator as Faker;

$factory->define(AdminAddress::class, function (Faker $faker) {
    return [
        //
        "address" => $faker->address,
        "admin_id" => function(){

             return factory(\App\Models\Admin::class)->create()->id;
        }

    ];
});
