<?php


use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
	$faker = \Faker\Factory::create('ru_RU');
	return [
		'name' => $faker->text($maxNbChars = 20) ,
		'price' => $faker->numberBetween($min = 50, $max = 1024),
		'pages' => $faker->numberBetween($min = 30, $max = 400),
		'pubyear' => $faker->numberBetween($min = 1900, $max = 2018),
		'description' => $faker->text($maxNbChars = 100) ,
		'slug' => $faker->slug,
		'lang' => $faker->randomElement($array = array ('UKR','RUS','ENG')),
	];
});

$factory->define(App\Author::class, function (Faker $faker) {
	$faker = \Faker\Factory::create('ru_RU');
	return [
		'name' => $faker->name,
		'slug' => $faker->slug,
		'birthyear' =>  $faker->numberBetween($min = 1900, $max = 2018),
	];
});

$factory->define(App\Genre::class, function (Faker $faker) {
	$faker = \Faker\Factory::create('ru_RU');
	return [
		'name' => $faker->text($maxNbChars = 20),
		'slug' => $faker->slug,
	];
});
