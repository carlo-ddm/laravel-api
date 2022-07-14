@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        @if ($errors->any())
            <div class="col-8 offset-2 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <form id="crate" action="{{route('admin.posts.update',$post)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text"
          class="form-control @error('title') is-invalid @enderror"
          id="title"
          name="title"
          placeholder="Titolo"
          value="{{old('title',$post->title)}}">
          @error('title')
          <p class="error-msg">{{$message}}</p>
          @enderror

        </div>

        <div class="form-group">
          <label for="content">Scrivi</label>
          <textarea class="form-control @error('title') is-invalid @enderror"
          id="content"
          name="content"
          cols="30"
          rows="10"
          value="">{{old('content',$post->content)}}</textarea>
          @error('content')
          <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div>
            <select
            class=" mb-3 form-select"
            aria-label="Default select example"
            name="category_id">
                <option value="">Seleziona la categoria</option>

                @foreach ($categories as $category)
                {{-- @dd($categories) --}}
                    <option
                        @if ($category->id === old('category_id', $post->category))
                            selected
                        @endif
                        value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            {{-- @dd($tags) --}}
            @foreach ($tags as $tag)

                <input type="checkbox"
                name="tags[]"
                id="tag{{$loop->iteration}}"

                @if (!$errors->any() && $post->tags->contains($tag->id))
                    checked
                @elseif ($errors->any() && in_array($tag->id, old('tags', [])))
                    checked
                @endif

                {{-- @if(in_array($tag->id, old('tags', [])) || $post->tags->contains($tag->id)) checked @endif --}}
                value="{{$tag->id}}">

                <label class="mr-3" for="tag{{$loop->iteration}}">{{$tag->name}}</label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-outline-success">CAMBIA</button>
      </form>
  </form>
@endsection
