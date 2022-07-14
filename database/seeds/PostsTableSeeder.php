<?php

use Illuminate\Database\Seeder;
// Utilizzo faker
use Faker\Generator as Faker;
// Utilizzo il model 'Post'
use App\Post;

// Non serve impostare qui Slug: il relativo procedimento di impostazione e la sua logica viene gestita direttamente per il singolo post (quindi nel model). Il seeder prende lo slug univoco generato nel Model (qui viene solo richiamato). Quindi qui non serve: ---> use Illuminate\Support\Str; <---



class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++){
            $new_post = new Post();
            $new_post->title = $faker->sentence();
            // Generazione slug
            $new_post->slug = Post::generateSlug($new_post->title);
            $new_post->content = $faker->text();
            $new_post->save();
        }
    }
}
