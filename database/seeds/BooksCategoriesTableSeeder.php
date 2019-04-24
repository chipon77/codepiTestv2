<?php

use Illuminate\Database\Seeder;

class BooksCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i = 1; $i <= 15; ++$i)
		{
			$numbers = range(1, 5);
			shuffle($numbers);
			$n = rand(1, 5);
			for($j = 1; $j < $n; ++$j)
			{
				DB::table('book_category')->insert(array(
					'book_id' => $i,
					'category_id' => $numbers[$j]
				));
			}
		}
    }
}
