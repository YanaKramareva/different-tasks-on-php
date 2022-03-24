<?php

namespace App\Implementations;

use Faker\Factory;

function buildUser($data = [])
{
    $faker = Factory::create();
    $defaultData = [
        'email' => $faker->email(),
        'firstName' => $faker->firstName(),
        'lastName' => $faker->lastName()
    ];
    return array_merge($defaultData, $data);
}
