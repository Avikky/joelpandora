@extends('layouts.app')

@section('content')

<style>
    .title-bar {
        padding: 1rem;
    }
</style>

    <div class=" title-bar">
        <h3>Add Post</h3>
    </div>
  
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                {{ Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Post title" required>
                </div>
                <div class="form-group">
                    <label for="tags">Select Tags:<small class="text-info">(optional)</small></label>
                    <select class="form-control select2-multi m-bot15" name="tags[]" id="" multiple="true">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    {{-- <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                        <option value="">Click to Choose tags</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="ckeditor" class="form-control ckeditor" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="tag">Select Category:</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    
                {{ Form::close() }}
                <br>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

  
@endsection

