@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Skills</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'SkillController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                <div class="form-group">
                    <label for="skil">Skill</label>
                    <input type="text" placeholder="Graphics" name="skill" id="" class="form-control">
                </div>
                 <div class="form-group">
                    <label for="rating">Rating</label>
                    <select name="rating" id="" class="form-control">
                        <option value="5">5 <i class="fas fa-star"></i></option>
                        <option value="4">4 <i class="fas fa-star"></i></option>
                        <option value="3">3 <i class="fas fa-star"></i></option>
                        <option value="2">2 <i class="fas fa-star"></i></option>
                        <option value="1">1 <i class="fas fa-star"></i></option>
                    </select>
                 </div>
                    <div class="form-group">
                    <label for="years_of_exp">Years of Experience</label>
                    <input type="text" name="years_of_exp" id="" placeholder="2 years" class="form-control">
                 </div>
           
                  {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
   
                  {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>My Skills</h3></div>
                  
                <div class="card-body">
                    @if (count($skills) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Skill</th>
                                      <th>Rating</th>
                                      <th>Years of Experience</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($skills as $skill)
                                    <tr>
                                        <td><span class="text-ellipsis">{{$skill->skill}}</span></td>
                                        <td><span class="text-ellipsis">{{$skill->rating}}</span></td>
                                        <td><span class="text-ellipsis">{{$skill->years_of_exp}}</span></td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$skill->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$skill->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                        {{-- Edit Modal is here --}}
                                            
                                        <div class="modal fade" id="editModal{{$skill->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                {{ Form::open(['action' => ['SkillController@update', $skill->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                    {{Form::hidden('_method', 'PUT')}}
                                                    <div class="form-group">
                                                    <label for="title">Skill</label>
                                                    <input type="text" name="skill" value="{{ $skill->skill }}" id="" class="form-control" required>
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label for="duration">Rating</label>
                                                    <input type="text" name="rating" id="" value="{{$skill->rating}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="duration">Years of Experience</label>
                                                        <input type="text" name="company" id="" value="{{$skill->years_of_exp}}" class="form-control">
                                                    </div>
                                                      
                                                    
                                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                {{ Form::close() }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal ends --}}

                                        {{ Form::open(['action' => ['SkillController@destroy', $skill->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                        {{Form::hidden('_method', 'DELETE')}}
                                            <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                            </button> 
                                        {{ Form::close() }} 
                                        <td>
                                    <tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$skills->links()}}
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
