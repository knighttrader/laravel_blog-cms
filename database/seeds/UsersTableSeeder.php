<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Reset the users table
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::table('users')->truncate();

    // Generate 3 users / authors
    DB::table('users')->insert([
    	[
				'name'     => 'John Doe',
				'email'    => 'johndoe@test.com',
				'password' => bcrypt('john')
    	],
    	[
				'name'     => 'Jane Doe',
				'email'    => 'janedoe@test.com',
				'password' => bcrypt('jane')
    	],
    	[
				'name'     => 'Edo Masaru',
				'email'    => 'edo@test.com',
				'password' => bcrypt('edo')
    	]
    ]);
  }
}
