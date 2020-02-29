@extends('layouts.app')

@section('content')
  <div class="title" style="padding: 1.5rem;">
    <h2>All Pages</h2>
    <div class="container">
      <p class="float-right"><a href="{{ url('/admin/addpage')}}" class="btn btn-primary">Create Page</a></p>
    </div>
  </div>
  <div class="container">
    <div class="panel panel-default">
      @if (count($pages) > 0)
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
                  <th>Page Name</th>
                  <th>Page url</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($pages as $page)
                    <tr>
                    <td><span class="text-ellipsis">{{$page->title}}</span></td>
                    <td><span class="text-ellipsis"> {{ $page->slug }} </span></td>
                    <td style="desplay:flex;">
                      <a href="{{url('/admin/editpage')}}/{{$page->id}}" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i></a> &nbsp;&nbsp;
                      {{ Form::open(['action' => ['adminController@destroy', $page->id], 'method' => 'POST', 'class' => 'float-right']) }}
                          {{Form::hidden('_method', 'DELETE')}}
                          <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i></button>
                      {{ Form::close() }}
                        
                      <td>
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
              <div class="col-sm-7 text-right text-center-xs">                
                  
              </div>        
            </div>
          </footer>
        </div>
   
      @else
        
        <p class="text-lg-center" style="padding-top: 3rem;"><i>You have No Post Yet...</i></p>

      @endif
    </div>
    <br>
  </div>
@endsection