@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Board Member</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'BoardController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="input" name="name" id="" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="position">Position</label>
                     <input type="input" name="position" id="" class="form-control">
                  </div>
                      <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control m-bot15" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div> 
                  <div class="form-group">
                    {{ Form::label('board_image', 'Profile image')}}
                    {{Form::file('board_image', ['class' => 'form-control'])}}
                </div>
                  {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
   
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Board Members</h3></div>
                   
                <div class="card-body">
                    @if (count($members) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td><img style="border: 1px solid white; width: 4.5rem; height: 3.6rem;" src="{{ asset('storage/board_images') }}/{{$member->board_image}}"> </td>
                                        <td><span class="text-ellipsis">{{$member->name}}</span></td>
                                        <td><span class="text-ellipsis">{{$member->position }}</span></td>
                                        <td><span class="text-ellipsis"> {{ $member->gender }} </span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$member->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$member->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['BoardController@update', $member->id], 'method' => 'POST']) }}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" value="{{ $member->name }}" id="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="position">Position</label>
                                                    <input type="text" name="position" value="{{ $member->position }}" id="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <input type="text" name="gender" value="{{ $member->gender }}" id="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                    {{ Form::label('board_image', 'Profile image')}}
                                                    {{Form::file('board_image', ['class' => 'form-control'])}}
                                                    </div>      
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}
                                        {{ Form::open(['action' => ['BoardController@destroy', $member->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                         {{ Form::close() }} 
                                        <td>
                                    <tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$members->links()}}
                        </div>
                    @else
                        <p class="m-t-10" style="text-align:center;"><i>No board members yet...</i></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
