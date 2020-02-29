@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Slider</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'SlidersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) }}

                  <div class="form-group">
                     <label for="title">Slider title</label>
                     <input type="text" name="title" id="" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="slide_text">Slider text</label>
                     <input type="input" name="slide_text" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    {{ Form::label('slide_image', 'Slide image')}}
                    {{Form::file('slide_image', ['class' => 'form-control'])}}
                </div>
                    {{-- @if(count($sliders) == 3)
                        {{Form::submit('Add', ['class' => 'btn btn-primary', 'disabled'])}}
                        <p class="text-danger"><i>you cannot have more than three slider</i></p>
                    @else --}}

                    {{Form::submit('Add', ['class' => 'btn btn-primary'])}} 
                  
   
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Existing Slider</h3></div>

                <div class="card-body">
                    @if (count($sliders) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Slide Title</th>
                                    <th>Slide Text</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td><img style="border: 1px solid white; width: 3.6rem; height: 2.6rem;" src="{{ asset('storage/slide_images') }}/{{$slider->slide_image}}"> </td>
                                        <td><span class="text-ellipsis">{{$slider->title}}</span></td>
                                        <td><span class="text-ellipsis">{!! substr($slider->slide_text,0, 50) !!}</span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$slider->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$slider->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['SlidersController@update', $slider->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                    <label for="title">Slide Title</label>
                                                    <input type="text" name="title" value="{{ $slider->title }}" id="" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="slide_text">Slide Text</label>
                                                        <input type="text" name="slide_text" value="{{ $slider->slide_text }}"  class="form-control" required>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                    {{ Form::label('slide_image', 'Project image')}}
                                                    {{Form::file('slide_image', ['class' => 'form-control'])}}
                                                    </div>      
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}
                                        {{ Form::open(['action' => ['SlidersController@destroy', $slider->id], 'method' => 'POST', 'class' => 'float-right']) }}
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
                        <p class="text-center"> <i>No slider yet</i> </p>
                    @endif
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
