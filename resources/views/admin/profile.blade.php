@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
       <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-header">Personal Data</div>
                <div class="card-body">
                  {{ Form::open(['action' => 'ProfileController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                  <div class="form-group">
                     <label for="firstname">First Name</label>
                     <input type="text" name="firstname" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" name="phone" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="address">Nationality</label>
                    <input type="text" name="nationality" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">State</label>
                    <input type="text" name="state" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">City</label>
                    <input type="text" name="city" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">Language</label>
                    <input type="text" name="language" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="address">Open for Freelancing</label>
                    <select name="freelance" id="" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                 </div>
                <div class="form-group">
                    <label for="linkedin">Linkedin handle</label>
                    <input type="text" name="linkedin_handle" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="facebook">facebook handle</label>
                    <input type="text" name="facebook_handle" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="facebook">facebook handle</label>
                    <input type="text" name="facebook_handle" id="" class="form-control">
                 </div>
                <div class="form-group">
                    <label for="twitter">Twitter handle</label>
                    <input type="text" name="twitter_handle" id="" class="form-control">
                 </div>
                     <div class="form-group">
                    <label for="instagram">Instagram handle</label>
                    <input type="text" name="instagram_handle" id="" class="form-control">
                 </div>
                  <div class="form-group">
                     <label for="address">Brief Bio </label>
                     <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
                  </div>       
                  <div class="form-group">
                    {{ Form::label('resume', 'Resume` File')}}
                    {{Form::file('resume', ['class' => 'form-control'])}}
                </div>
                  <div class="form-group">
                    {{ Form::label('profile_image', 'Profile image')}}
                    {{Form::file('profile_image', ['class' => 'form-control'])}}
                </div>
                  {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
   
                  {{ Form::close() }}
                </div>
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3>Profile Details</h3></div>
                    
                <div class="card-body">
                    @if (count($profiles) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped  b-t b-light">
                                <thead>
                                    <tr>
                                    <th>Image</th>
                                    <th>Resume` file</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Nationality</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Language</th>
                                    <th>Bio</th>
                                    <th>LinkedIn</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($profiles as $profile)
                                    <tr>
                                        <td>
                                            <img style="border: 1px solid white; width: 3.6rem; height: 2.6rem;" src="{{ asset('storage/profile_images') }}/{{$profile->profile_image}}">
                                        </td>
                                        <td>
                                            @if($profile->resume != null)
                                            <img style="border: 1px solid white; width: 3.6rem; height: 2.6rem;" src="{{ asset('admin_assets/images/resume-img.png') }}">
                                            <span>{{$profile->resume}}</span>
                                            @else
                                            <span class="text-ellipsis">No File</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->firstname}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->lastname}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->email}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->phone}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->nationality}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->state}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->city}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->address}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->language}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{!! substr($profile->bio, 0, 50)!!}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->linkedin_handle}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->facebook_handle}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->twitter_handle}}</span>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">{{$profile->instagram_handle}}</span>
                                        </td>
                                        <td style="desplay:flex;">
                                            <a href="#editModal{{$profile->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$profile->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                                            {{-- Edit Modal is here --}}
                                            
                                            <div class="modal fade" id="editModal{{$profile->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        {{ Form::open(['action' => ['ProfileController@update', $profile->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                            {{Form::hidden('_method', 'PUT')}}
                                                        
                                                            <div class="form-group">
                                                                <label for="firstname">First Name</label>
                                                                <input type="text" value="{{$profile->firstname}}" name="firstname" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="lastname">Last Name</label>
                                                                <input type="text" name="lastname" value="{{ $profile->lastname }}" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">E-mail</label>
                                                                <input type="email" value="{{$profile->email }}" name="email" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="phone">phone</label>
                                                                <input type="text" value="{{ $profile->phone }}" name="phone" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="language">Nationality</label>
                                                                <input type="text" value="{{$profile->nationality}}" name="nationality" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="language">State</label>
                                                                <input type="text" value="{{$profile->state}}" name="state" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="language">City</label>
                                                                <input type="text" value="{{$profile->city}}" name="city" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" value="{{$profile->address}}" name="address" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="language">Language</label>
                                                                <input type="text" value="{{$profile->language}}" name="language" id="" class="form-control">
                                                            </div>
                                                       
                                                            <!-- <div class="form-group">
                                                                <label for="address">Open for Freelancing</label>
                                                                <select name="freelance" id="" class="form-control">
                                                                    <option value="{{$profile->freelance}}">
                                                                        {{$profile->freelance}}
                                                                    </option>
                                                                    @if ($profile->freelance == "Yes")
                                                                    <option value="No">No</option>
                                                                    @else
                                                                    <option value="Yes">Yes</option>
                                                                    @endif
                                                                </select>
                                                            </div> -->
                                                            <div class="form-group">
                                                                <label for="linkedin_handle">Linkedin handle</label>
                                                                <input type="text" value="{{$profile->linkedin_handle}}" name="linkedin_handle" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="facebook">Facebook handle</label>
                                                                <input type="text" value="{{$profile->facebook_handle}}" name="facebook_handle" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="twitter">Twitter handle</label>
                                                                <input type="text" value="{{$profile->twitter_handle}}" name="twitter_handle" id="" class="form-control">
                                                            </div>
                                                                <div class="form-group">
                                                                <label for="instagram">Instagram handle</label>
                                                                        <input type="text" value="{{$profile->instagram_handle}}" name="instagram_handle" id="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Brief Bio </label>
                                                                <textarea name="bio" class="form-control ckeditor" cols="30" rows="10">
                                                                    {!! substr($profile->bio,0, 50) !!}
                                                                </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                            {{ Form::label('resume', 'Resume` file')}}
                                                            {{Form::file('resume', ['class' => 'form-control', 'required'])}}
                                                            </div>  
                                                            <div class="form-group">
                                                            {{ Form::label('profile_image', 'Profile image')}}
                                                            {{Form::file('profile_image', ['class' => 'form-control', 'required'])}}
                                                            </div>      
                                                            
                                                            {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                                                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Edit Modal ends --}}
                                            {{ Form::open(['action' => ['ProfileController@destroy', $profile->id], 'method' => 'POST', 'class' => 'float-right']) }}
                                            {{Form::hidden('_method', 'DELETE')}}
                                                <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i>
                                                </button> 
                                            {{ Form::close() }} 
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$profiles->links()}}
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
