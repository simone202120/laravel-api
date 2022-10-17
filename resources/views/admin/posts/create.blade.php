@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="post">
            @csrf

            
            <div class="form-group mb-3">
                <label for="category_id">Category</label>

                <select name="category_id" class="form-control" id="category_id">
                    <option {{(old('category_id')=="")?'selected':''}} value="">Nessuna categoria</option>
                    @foreach ($categories as $category)
                        <option {{(old('category_id')==$category->id)?'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title">
                <small id="title" class="form-text text-muted">Titolo Post </small>
            </div>
            <div class="form-group">
                <label for="content">Corpo del Post</label>
               <textarea class="form-control" id="content" name='content'>

               </textarea>
            </div>

            <div class="card p-3">
                @foreach ($tags as $tag)
                    <div class="form-group form-check">
                        <input {{(in_array($tag->id, old('tags', [])))?'checked':''}}
                            name="tags[]"
                            type="checkbox"
                            class="form-check-input"
                            id="tag_{{$tag->id}}"
                            value="{{$tag->id}}"
                        >
                        <label class="form-check-label" for="tag_{{$tag->id}}">{{$tag->name}} {{$tag->id}}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Crea Post</button>

        </form>

    </div>



@endsection