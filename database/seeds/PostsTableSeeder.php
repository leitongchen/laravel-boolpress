<?php

use Illuminate\Database\Seeder;
use App\Post; 

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        for ($i=0; $i<40; $i++) {
            $posts = factory(Post::class)->create(); 
        }
    }
}
