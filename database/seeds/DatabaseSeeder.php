<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Post;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->down();
        
		Model::unguard();

        $faker = Faker\Factory::create();

        User::create(array(
            'username' => 'admin',
            'password' => \Hash::make('admin')
        ));


        foreach(range(0,30) as $n)
        {
            Post::create(array(
                'email' => $faker->email,
                'address' => $faker->address,
                'name' => $faker->word,
                'text' => $faker->text(400)
            ));
        }
            
	}

    public function down()
    {
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        $this->command->info('Tables seeded!');
    }
    

}
