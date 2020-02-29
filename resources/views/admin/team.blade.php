@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Staff/Team</div>
                
                <div class="card-body">
                  {{ Form::open(['action' => 'StaffController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" name="department" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="input" name="position" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control m-bot15" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">About Team Member</label>
                     <textarea name="about" class="ckeditor" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        {{ Form::label('staff_image', 'Staff image')}}
                        {{Form::file('staff_image', ['class' => 'form-control'])}}
                        <i style="color: red;">max image size is 20mb</i>
                    </div>
                  {{Form::submit('Add', ['class' => 'btn btn-primary'])}}       
   
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>SpecsTech Staff Members</h3></div>
                   
                <div class="card-body">
                    @if (count($allstaff) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($allstaff as $staff)
                                    <tr>
                                        <td><img style="border: 1px solid white; width: 4.5rem; height: 3.6rem;" src="{{ asset('storage/staff_images') }}/{{$staff->staff_image}}"> </td>
                                        <td><span class="text-ellipsis">{{$staff->name}}</span></td>
                                        <td><span class="text-ellipsis">{{$staff->email}}</span></td>
                                        <td><span class="text-ellipsis">{{$staff->phone}}</span></td>
                                        <td><span class="text-ellipsis">{{$staff->department}}</span></td>
                                        <td><span class="text-ellipsis">{{$staff->position }}</span></td>
                                        <td><span class="text-ellipsis"> {{ $staff->gender }} </span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$staff->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$staff->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['StaffController@update', $staff->id], 'method' => 'POST']) }}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" value="{{ $staff->name }}"  class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" value="{{ $staff->email }}"  class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" name="phone" value="{{ $staff->phone }}"  class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="department">Department</label>
                                                        <input type="text" name="department" value="{{ $staff->department }}"  class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="position">Position</label>
                                                    <input type="text" name="position" value="{{ $staff->position }}" id="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <select class="form-control m-bot15" name="gender">
                                                        <option value="{{$staff->gender}}">{{$staff->gender}}</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                    {{ Form::label('staff_image', 'Staff Image')}}
                                                    {{Form::file('staff_image', ['class' => 'form-control'])}}
                                                    </div>      
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}
                                        {{ Form::open(['action' => ['StaffController@destroy', $staff->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                         {{ Form::close() }} 
                                        <td>
                                    <tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$allstaff->links()}}
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