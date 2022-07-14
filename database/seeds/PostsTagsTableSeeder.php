<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class PostsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            // estrazione di un post random
            $post = Post::inRandomOrder()->first();
            // estraggo random l'id di un tag
            $tag_id = Tag::inRandomOrder()->first()->id;
            //inserisco il dato nella tabella ponte (ricorda laravel trova la tab anche se non esiste il model della tab ponte). Con 'attach'viene inserita la relazione nella tabella ponte. Ad attach posso passare un singolo id o un array di id.
            $post->tags()->attach($tag_id);
        }
    }
}
