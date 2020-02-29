@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Services</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'ServicesController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) }}

                  <div class="form-group">
                     <label for="title">Title</label>
                     <input type="text" name="title" id="" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="description">Description</label>
                     <textarea name="description" class="ckeditor" cols="30" rows="10"></textarea>
                  </div>
            
                  <div class="form-group">
                    {{ Form::label('service_image', 'Service image (optional)')}}
                    {{Form::file('service_image', ['class' => 'form-control'])}}
                </div>
                  {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
   
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Services</h3></div>
                  
                <div class="card-body">
                    @if (count($services) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td><img style="border: 1px solid white; width: 4.5rem; height: 3.6rem;" src="{{ asset('storage/service_images') }}/{{$service->service_image}}"> </td>
                                        <td><span class="text-ellipsis">{{$service->title}}</span></td>
                                        <td><span class="text-ellipsis">{!! substr($service->description,0, 50) !!}</span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$service->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$service->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['ServicesController@update', $service->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" value="{{ $service->title }}" id="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" class="ckeditor" cols="30" rows="10">
                                                            {{ $service->description }}
                                                        </textarea>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                    {{ Form::label('service_image', 'Service image')}}
                                                    {{Form::file('service_image', ['class' => 'form-control'])}}
                                                    </div>      
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}
                                        {{ Form::open(['action' => ['ServicesController@destroy', $service->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                        {{ Form::close() }} 
                                        <td>
                                    <tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="m-t-10" style="text-align:center;"><i>No Service yet...</i></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
