@extends('layouts.app')

@section('content')
      <div class=" title-bar">
      <h3>Edit : {{$post->title}}</h3>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            {{ Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="form-group">
                  <label for="title">Title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="Post title">
            </div>
            <div class="form-group">
                  <label for="tags">Choose Tags:<small class="text-info">(optional)</small></label>
                  <select name="tags[]"  class="form-control select2-multi" multiple="true">
                        @foreach ($tags as $tag)  
                              <option value="{{$tag->id}}">{{$tag->name}}</option>          
                        @endforeach

                 </select>
            
            </div>
            <div class="form-group">
                  <label for="body">Body</label>
            <textarea name="body"  class="form-control ckeditor" cols="30" rows="10">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                  <label for="tag">Select Category:</label>
                  <select class="form-control" name="category_id">
                   @foreach ($categories as $category)
                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                  </select>
            </div>
            <div class="form-group">
                  {{-- <label for="cover_image">cover image</label>
                  <input type="file" name="cover_image" id="" class="form-control"> --}}
                  {{ Form::label('cover_image', 'Add cover image')}}
                  {{Form::file('cover_image', ['class' => 'form-control'])}}
            </div>
           <div class="form-group">
              <label for="tag">Would You like to save this post as a draft and Publish it later</label>
              <select class="form-control" name="draft">
                  <option value="0">No</option>
                   <option value="1">Yes</option>
              </select>
          </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

            {{ Form::close() }}
            <br>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
      {{-- <script>
            $('.select2-multi').select2();
            $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()->toArray()) !!}).trigger('change');
      </script> --}}
@endsection

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script>
      $('.select2-multi').select2();
      $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()->toArray()) !!}).triger('change');
 </script>