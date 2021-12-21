<?php

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mail' => $faker->mail,
        'age' => $faker->numberBetween(1, 100),
    ];
});
