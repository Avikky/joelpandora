@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Create Category</div>
                <div class="card-body">
                    {{ Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) }}

                    <div class="form-group">
                    <label for="name">Category</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                    {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
      
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Categories</h3></div>

                <div class="card-body">
                    @if (count($catItems) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($catItems as $item)
                                    @if ($item->name == 'Uncategorised' || $item->id == 1)
                                    {{-- Hidding The uncategorised data --}}
                                    @else
                                         <tr>
                                        <td>
                                          {{$item->id}}
                                        </td>
                                        <td><span class="text-ellipsis">{{$item->name}}</span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$item->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$item->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h3 class="modal-title" id="staticModalLabel">Edit Category</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['CategoriesController@update', $item->id], 'method' => 'POST']) }}

                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                    <label for="name">Category</label>
                                                    <input type="text" name="name" value="{{ $item->name }}" id="" class="form-control" required>
                                                    </div>   
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}
                                        {{ Form::open(['action' => ['CategoriesController@destroy', $item->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                         {{ Form::close() }} 
                                        <td>
                                    <tr>    
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            {{$catItems->links()}}
                        </div>
                    @else
                        <p class="m-t-10" style="text-align:center;"><i>No Category yet...</i></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
