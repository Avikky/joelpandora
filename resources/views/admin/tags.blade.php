@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Create Tag</div>
                <div class="card-body">
                    {{ Form::open(['action' => 'TagController@store', 'method' => 'POST']) }}

                    <div class="form-group">
                    <label for="name">Tag</label>
                    <input type="input" name="name" id="" class="form-control">
                </div>
                    {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
      
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Tags</h3></div>
                <div class="card-body">
                        @if (count($tags) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td><span class="text-ellipsis">{{$tag->name}}</span></td>
                                            <td style="desplay:flex;">
                                                <a href="#editModal{{$tag->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$tag->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                            {{-- Edit Modal is here --}}
                                                
                                            <div class="modal fade" id="editModal{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3 class="modal-title" id="staticModalLabel">Edit Tag</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    {{ Form::open(['action' => ['TagController@update', $tag->id], 'method' => 'POST']) }}

                                                        {{Form::hidden('_method', 'PUT')}}
                                                        <div class="form-group">
                                                        <label for="name">Tag</label>
                                                        <input type="text" name="name" value="{{ $tag->name }}" id="" class="form-control" required>
                                                        </div>   
                                                        
                                                        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                    {{ Form::close() }}
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                            {{-- Edit Modal ends --}}
                                            {{ Form::open(['action' => ['TagController@destroy', $tag->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                            {{Form::hidden('_method', 'DELETE')}}
                                                <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                                </button> 
                                            {{ Form::close() }} 
                                            <td>
                                        <tr>    
                                    @endforeach
                                </tbody>
                            </table>
                            {{$tags->links()}}
                        </div>
                    @else
                        <p class="m-t-10" style="text-align:center;"><i>No Tags Available...</i></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
