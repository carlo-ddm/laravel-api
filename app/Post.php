<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Post extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id'
    ];

    public static function generateSlug($title){
        $slug = Str::slug($title, '-');
        // Creo la base dello slug
        $slug_base = $slug;
        // Imposto la logica di univocità --> cerco l'esistenza dello slug, se lo trovo ne genero uno univo con un counter
        $post_esistente = Post::where('slug', $slug)->first();
        $counter = 1;

        while($post_esistente){
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $post_esistente = Post::where('slug', $slug)->first();
        }
        return $slug;
    }
}
