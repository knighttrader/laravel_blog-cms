<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
  	// Reset the post table
  	DB::table('posts')->truncate();

  	// Generate 10 dummy posts data
		$days  = rand(0, 15);
		$posts = [];
		$faker = Factory::create();

  	for($i = 1; $i <=10; $i++)
  	{
			$image = "Post_Image_".rand(1, 10).".jpg";
			$days  += rand(0, 5) + $i;
			$date  = date("Y-m-d H:i:s", strtotime("2019-01-01 09:00:00 +{$days} days"));

  		$posts[] = [
				'author_id'  => rand(1,3),
				'title'      => $faker->sentence(rand(8, 12)),
				'excerpt'    => $faker->text(rand(250, 300)),
				'body'       => $faker->paragraphs(rand(10, 15), true),
				'slug'       => $faker->slug(),
        'image'      => $image,
        // 'image'      => rand(0, 1) == 1 ? $image :
				// 								rand(0, 1) == 1 ? $image :
				// 								rand(0, 1) == 1 ? $image : NULL,
				// 								// Increase Probability for data to have image
				'created_at' => $date,
				'updated_at' => $date,
  		];
  	}

  	DB::table('posts')->insert($posts);
  }
}
