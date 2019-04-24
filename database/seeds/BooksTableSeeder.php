<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 0; $i < 15; ++$i)
		{
	        DB::table('books')->insert([
		       	'title'=> 'Title'.$i,
		       	'author'=> 'Author'.$i,
		       	'editor'=> 'Editor'.$i,
		       	'type'=> 'Type'.$i,
		       	'price'=>rand(1, 20) ,
		       	'display'=>'1',
    	   ]);
    	}
    }
}
