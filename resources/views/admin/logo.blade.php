@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Logo</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'LogosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" name="name" id="" class="form-control">
                  </div>
               
                  <div class="form-group">
                    {{ Form::label('image', 'Logo Image')}}
                    {{Form::file('image', ['class' => 'form-control'])}}
                </div>
                @if (count($logos) > 1)
                  {{Form::submit('Add', ['class' => 'btn btn-primary', 'disabled'])}}
                  <p class="text-danger">please you can only have one logo</p>
                @else
                    {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
                @endif
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Logo</h3></div>
                  
                <div class="card-body">
                    @if (count($logos) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($logos as $logo)
                                    <tr>
                                        <td><img style="border: 1px solid white; width: 3.6rem; height: 2.6rem;" src="{{ asset('storage/logo_images') }}/{{$logo->image}}"> </td>
                                        <td><span class="text-ellipsis">{{$logo->name}}</span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$logo->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$logo->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$logo->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['LogosController@update', $logo->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" value="{{ $logo->name }}" id="" class="form-control" required>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                    {{ Form::label('image', 'Logo image')}}
                                                    {{Form::file('image', ['class' => 'form-control'])}}
                                                    </div>      
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}
                                        {{ Form::open(['action' => ['LogosController@destroy', $logo->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                        {{ Form::close() }} 
                                        <td>
                                    <tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$logos->links()}}
                        </div>
                    @else
                        <p class="m-t-10" style="text-align:center;"><i>No record yet...</i></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
