<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'order_id'  => array_rand([1, 10]),
        'product_id'  => array_rand([1, 10]),
        'product_name' => $name,
        'price' => $faker->randomNumber(4),
        'qty' => array_rand([1, 10]),
    ];
});
