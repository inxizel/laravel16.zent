<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	for ($i = 0; $i < 50; $i++) {
            DB::table('comments')->insert([ //,
                'user_id' => 1,
                'blog_id' => 1,
        		'comment' => $faker->text($maxNbChars = 10000)
        		
            ]);
        }
    }
}
