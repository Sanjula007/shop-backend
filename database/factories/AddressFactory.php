<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define ( \App\Address::class , function ( Faker $faker ) {
	return [
		'address1' => $faker->streetName ,
		'address2' => $faker->streetAddress ,
		'address3' => $faker->city,
	];
} );
