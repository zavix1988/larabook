<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//
		App\Book::truncate();
		App\Genre::truncate();
		App\Author::truncate();

		factory(App\Book::class, 50)->create()->each(function($books) {
		$books->authors()->save(factory(App\Author::class)->make());
		$books->genres()->save(factory(App\Genre::class)->make());
		});
	}
}
