 @extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Work Experience</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'ExperienceController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                <div class="form-group">
                    <label for="title">Job Title</label>
                    <input type="text" placeholder="Graphics Designer" name="title" id="" class="form-control">
                </div>
                 <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" id="" placeholder="From feb 2020 to june 2023" class="form-control">
                 </div>
                    <div class="form-group">
                    <label for="duration">Company/Organisation</label>
                    <input type="text" name="company" id="" placeholder="Andela" class="form-control">
                 </div>
                  <div class="form-group">
                     <label for="description">Description</label>
                     <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                  </div>
                  
    
                  {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
   
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Work Experience</h3></div>
                  
                <div class="card-body">
                    @if (count($experiences) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Title</th>
                                      <th>Duration</th>
                                      <th>Company/Organisation</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($experiences as $experience)
                                    <tr>
                                        <td><span class="text-ellipsis">{{$experience->title}}</span></td>
                                        <td><span class="text-ellipsis">{{$experience->duration}}</span></td>
                                           <td><span class="text-ellipsis">{{$experience->company}}</span></td>
                                        <td><span class="text-ellipsis">{!! substr($experience->description,0, 50) !!}</span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$experience->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$experience->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$experience->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['ExperienceController@update', $experience->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                    <label for="title">Job Title</label>
                                                    <input type="text" name="title" value="{{ $experience->title }}" id="" class="form-control" required>
                                                    </div>
                                                
                                                
                                                    <div class="form-group">
                                                        <label for="duration">Duration</label>
                                                    <input type="text" name="duration" id="" value="{{$experience->duration}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="duration">Company/Organisation</label>
                                                    <input type="text" name="company" id="" value="{{$experience->company}}" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" class="form-control" id="" cols="30" rows="10" required>{!! $experience->description !!}</textarea>
                                                    </div>
                                                      
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}

                                        {{ Form::open(['action' => ['ExperienceController@destroy', $experience->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                        {{ Form::close() }} 
                                        <td>
                                    <tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$experiences->links()}}
                        </div>
                    @else
                        <p class="m-t-10" style="text-align:center;"><i>No Data yet...</i></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
