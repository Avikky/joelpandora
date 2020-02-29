@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Social Handle</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'SocialController@store', 'method' => 'POST']) }}

                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="input" name="name" id="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" id="" class="form-control" required>
                  </div>
         
                  {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
   
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
          <div class="card">
               <h3 class="card-header text-center">Existing Handles</h3>
            <div class="card-body">
              @if (count($socials) > 0)
                <div class="table-responsive">
                  <table class="table table-striped bg-grey b-t b-light">
                    <thead>
                      <tr>
                        <th>Handle</th>
                        <th>Link</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($socials as $social)
                        <tr>
                          <td><span class="text-ellipsis"> {{$social->name}} </span></td>
                          <td><span class="text-ellipsis"> {{ $social->link }} </span></td>
                          <td style="desplay:flex;">
                            <a href="#editModal{{$social->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$social->id}}"><i class="fa fa-edit text-success text-active"></i></a> 
    
                            {{-- Edit Modal is here --}}
                                
                              <div class="modal fade" id="editModal{{$social->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                <div class="modal-dialog modal-md" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticModalLabel">Edit Handle</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      {{ Form::open(['action' => ['SocialController@update', $social->id], 'method' => 'POST']) }}
    
                                        <div class="form-group">
                                          <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $social->name }}" id="" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="link">Link</label>
                                          <input type="text" name="link" value="{{ $social->link }}" id="" class="form-control" required>
                                        </div>
                                        {{Form::hidden('_method', 'PUT')}}
                                        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                      {{ Form::close() }}
                                    </div>
                                  </div>
                                </div>
                              </div>
    
                            {{-- Edit Modal ends --}}
    
                            {{ Form::open(['action' => ['SocialController@destroy', $social->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                {{Form::hidden('_method', 'DELETE')}}
                                <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i></button>
                            {{ Form::close() }} 
                          <td>
                        <tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>  
              @else
                <p class="text-center"><i>No social media yet handle</i></p>  
              @endif
              
          </div>
        </div>
       
      </div>
    </div>
</div>
@endsection
