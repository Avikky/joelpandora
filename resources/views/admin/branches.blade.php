@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Branches</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'BranchesController@store', 'method' => 'POST']) }}

                  <div class="form-group">
                     <label for="name">Branch Name</label>
                     <input type="input" name="name" id="" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="branch_manager">Branch Manager</label>
                     <input type="input" name="branch_manager" id="" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="location">Location</label>
                     <input type="input" name="location" id="" class="form-control">
                  </div>   
                  {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
   
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Branches</h3></div>

                <div class="card-body">
                    @if (count($branches) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Branch Name</th>
                                    <th>Branch Manager</th>
                                    <th>Location/Address</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($branches as $branch)
                                    <tr>
                                        <td><span class="text-ellipsis">{{$branch->name}}</span></td>
                                        <td><span class="text-ellipsis">{{$branch->branch_manager}}</span></td>
                                        <td><span class="text-ellipsis"> {{ $branch->location }} </span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$branch->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$branch->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['BranchesController@update', $branch->id], 'method' => 'POST']) }}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" value="{{ $branch->name }}" id="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="branch_manager">Branch Manager</label>
                                                    <input type="text" name="branch_manager" value="{{ $branch->branch_manager }}" id="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="location">Location</label>
                                                    <input type="text" name="location" value="{{ $branch->location }}" id="" class="form-control" required>
                                                    </div>   
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}
                                        {{ Form::open(['action' => ['BranchesController@destroy', $branch->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                        {{ Form::close() }} 
                                        <td>
                                    <tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$branches->links()}}
                        </div>
                    @else
                        <p class="m-t-10" style="text-align:center;"><i>No Branches yet...</i></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
