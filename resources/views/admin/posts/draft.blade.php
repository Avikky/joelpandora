@extends('layouts.app')

@section('content')
  <div class="title" style="padding: 1.5rem;">
    <h2>Draft Posts</h2>
 <hr />
  </div>
   <br><br>
  <div class="container">
  <p class="float-right"><a href="{{route('showAddPost')}}" class="btn btn-primary">Add Post</a></p>
  <p class="float-left"><a href="{{route('allpost')}}" class="btn btn-primary">Back</a></p>
  </div>
  <div class="container">
    <div class="panel panel-default">
      @if (count($drafts) > 0)

        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">order by date</option>
              <option value="1">order by last post</option>
            </select>            
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
            </div>
          </div>
          </div>
          <hr>
          <br>
          <div class="table-responsive">
            <table class="table table-striped table-dark b-t b-light">
              <thead>
                <tr>
                  <th>Cover image</th>
                  <th>title</th>
                  <th>Post</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($drafts as $draft)
                    <tr>
                        <td><img style="border: 1px solid white; width: 3rem; height: 3rem;" src="{{ asset('storage/cover_images') }}/{{$draft->cover_image}}"> </td>
                        <td><span class="text-ellipsis">{{$draft->title}}</span></td>
                        <td><span class="text-ellipsis">{!! substr($draft->body,0,50) !!}</span></td>
                        <td><span class="text-ellipsis"> {{ $draft->category->name }} </span></td>
                        <td style="desplay:flex; justify-content: space-around; align-items: center;">
                           {{ Form::open(['action' => ['PostsController@publish', $draft->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                {{Form::hidden('_method', 'PUT')}}
                                <input name="draft" value="0" type="hidden">
                                <button type="submit" class="btn btn-primary" name="publishDraft">Publish
                                </button> 
                            {{ Form::close() }} 
                            <a href="{{url('admin/posts/edit')}}/{{$draft->id}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a> &nbsp;&nbsp;
                        </td>
                    <tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <br>
          <footer class="panel-footer">
            <div class="row">
              <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
              </div>
         
            </div>
          </footer>
        </div>
      @else
        
        <p class="text-lg-center" style="padding-top: 3rem;"><i>You have No Saved draft...</i></p>

      @endif
    </div>
    <br>
  </div>
@endsection