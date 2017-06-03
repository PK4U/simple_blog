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
        DB::table('posts')->delete();

        Post::create(array(
        	'title' => 'Day 1: All is well; Everyone is happy!',
        	'body' => 'No one suspects a thing. We will continue as planned. Hopefully we all get out alive once the week is up.',
        	'author' => 'Peter'
        ));

        Post::create(array(
        	'title' => 'Day 2: River Rafting!',
        	'body' => 'Today was a blast! The rapids were radical. I almost fell out of the raft. Oh no, where did I put my camera? It must have fell into the river. Ya, probably... Someone stole my food this morning though... Why am I so itchy?',
        	'author' => 'Meg'
        ));

        Post::create(array(
        	'title' => 'Day 3: Rock Climbing...',
        	'body' => 'I am afraid of heights, did I not mention that on my questionaire??? I think the fat one is trying to kill us. He also has been stealing food. Is anyone else really itchy? It probably fell into the river... Wait, where did I get this camera from?',
        	'author' => 'Lois'
        ));
    }
}
