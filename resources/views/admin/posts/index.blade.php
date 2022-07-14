{{-- creare la tabella tags
creare la tabella post_tag con le FK
inserire belongsToMany nei model in relazione mani to many
popolare la tabella tags
popolare la tabella ponte con elementi random
inserire i tags nella index e nella show (se ci sono)
aggiungere i chackbox dei tag nel form del create (gestire l’old())
fare lo store dei tags solo se esistono
aggiungere i chackbox dei tag nel form dell’edid (gestire l’old()  e l’eventuale presenza del dato nel post da editare)
in update gestire la presenza del dato e sincronizzare la tabella ponte
cosa fare in destroy? --}}

{{-- Clonare la repo  laravel-many-to-many., eliminare la cartella .git e rinominarla laravel-api.
Continuare quindi sullo stesso progetto seguendo la seguente todo-list:

creare una API che generi un json contenente tutti i post

separare gli scss fra admin e post in relative cartelle

aggiornare di conseguenza i percorsi in webpack.mix e nelle view.

separate i js in front e admin

aggiornare di conseguenza i percorsi in webpack.mix e nelle view

togliere la polvere da Vue :linguaccia_occhiolino:
creare un componente App.vue
innestare App.vue in vue
importare axios globalmente in front.js
da App.vue fare una chiamata axios all’API dei post
stampare in pagina tutti i post con v-for

formula per iniettare App.vue in #app  (prima bisogna importare il componente…)

const app = new Vue({
    el: '#app',
    render: h => h(App)
}); --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Index Crud</h1>

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
              <th scope="row">{{$post->id}}</th>
              <td>{{$post->title}}</td>
              <td>{{$post->category ? $post->category->name : '-'}}</td>
              <td>

                @forelse ($post->tags as $tag)
                    <span class="badge rounded-pill bg-info text-dark">{{$tag->name}}</span>
                @empty
                    -
                @endforelse
              </td>
              <td>
                  <a class="btn btn-outline-primary" href="{{route('admin.posts.show', $post)}}" >SHOW</a>
                  <a class="btn btn-outline-success" href="{{route('admin.posts.edit', $post)}}" >MODIFICA</a>
            </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{$posts->links()}}
      <div class="container">
        @foreach ($categories as $category)
        <h3>{{$category->name}}</h3>
            <ul>
                @forelse ($category->posts as $post)
                    <li><a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a></li>
                    @empty
                    <li>Non sono presenti post per questa categoria</li>
                @endforelse
            </ul>
        @endforeach
      </div>

</div>
@endsection
