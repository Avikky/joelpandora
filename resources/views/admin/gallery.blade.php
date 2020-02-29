@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Gallery</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'GalleryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" name="name" id="" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="description">Description</label>
                     <input type="text" name="description" id="" class="form-control">
                  </div>
            
                  <div class="form-group">
                    {{ Form::label('gallery_image', 'Gallery Image')}}
                    {{Form::file('gallery_image', ['class' => 'form-control'])}}
                </div>
                  {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
   
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Gallery</h3></div>
                  
                <div class="card-body">
                    @if (count($galleries) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($galleries as $gallery)
                                    <tr>
                                        <td><img style="border: 1px solid white; width: 3.6rem; height: 2.6rem;" src="{{ asset('storage/gallery_images') }}/{{$gallery->gallery_image}}"> </td>
                                        <td><span class="text-ellipsis">{{$gallery->name}}</span></td>
                                        <td><span class="text-ellipsis">{!! substr($gallery->description,0, 50) !!}</span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$gallery->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$gallery->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['GalleryController@update', $gallery->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" value="{{ $gallery->name }}" id="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <input type="text" name="description" value="{{ $gallery->description }}"  class="form-control" required>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                    {{ Form::label('gallery_image', 'gallery image')}}
                                                    {{Form::file('gallery_image', ['class' => 'form-control'])}}
                                                    </div>      
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}
                                        {{ Form::open(['action' => ['GalleryController@destroy', $gallery->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                        {{ Form::close() }} 
                                        <td>
                                    <tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$galleries->links()}}
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
