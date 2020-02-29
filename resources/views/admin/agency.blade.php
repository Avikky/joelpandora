
@extends('layouts.app')

@section('content')

  <div class="container">
      <h3>Intending Agents</h3>
      <hr>
    <div class="panel panel-default">
      @if (count($response) > 0)

        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">order by date</option>
              <option value="1">order by last post</option>
            </select>            
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
            </div>
          </div>
          </div>
          <hr>
          <br>
          <div class="table-responsive">
            <table class="table table-striped table-dark b-t b-light">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>gender</th>
                  <th>State of Residence</th>
                  <th>Residential Address</th>
                  <th>Business Type</th>
                  <th>Buisness Address/Location</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($response as $respond)
                    <tr>
                    <td><span class="text-ellipsis">{{$respond->name}}</span></td>
                    <td><span class="text-ellipsis">{{$respond->phone}}</span></td>
                    <td><span class="text-ellipsis">{{$respond->email}}</span></td>
                    <td><span class="text-ellipsis"> {{ $respond->gender }} </span></td>
                    <td><span class="text-ellipsis"> {{ $respond->state }} </span></td>
                    <td><span class="text-ellipsis"> {{ $respond->address }} </span></td>
                    <td><span class="text-ellipsis"> {{ $respond->business_type }} </span></td>
                    <td><span class="text-ellipsis"> {{ $respond->business_location }} </span></td>
                    <td style="desplay:flex;">
                        {{-- <a href="#editModal{{$respond->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$respond->id}}"><i class="fa fa-edit text-success text-active"></i></a>  --}}

                        {{-- Edit Modal is here --}}
                            
                        {{-- <div class="modal fade" id="editModal{{$respond->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                {{ Form::open(['action' => ['ReviewController@update', $respond->id], 'method' => 'POST']) }}

                                    {{Form::hidden('_method', 'PUT')}}

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $respond->name }}" id="" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="service">Phone</label>
                                        <input type="text" name="phone" value="{{ $respond->phone }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="service">Company</label>
                                        <input type="text" name="company_name" value="{{ $respond->company_name }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="service">Staff Position in the Company</label>
                                        <input type="text" name="position" value="{{ $respond->company_name }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="service">Satisfaction</label>
                                            <input type="text" name="satisfied" value="{{ $respond->satisfied }}" id="" class="form-control">
                                        </div>
                                    <div class="form-group">
                                        <label for="name">Review</label>
                                        <textarea name="feedback" class="ckeditor" cols="30" rows="10">
                                            {!! $respond->feedback !!}
                                        </textarea>
                                     </div>  
                                    
                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                {{ Form::close() }}
                                </div>
                            </div>
                            </div>
                        </div> --}}

                        {{-- Edit Modal ends --}}

                      {{ Form::open(['action' => ['AgencyController@destroy', $respond->id], 'method' => 'POST', 'class' => 'float-right']) }}
                          {{Form::hidden('_method', 'DELETE')}}
                          <button type="submit" name="Delete"><i class="fa fa-trash text-danger text"></i></button>
                      {{ Form::close() }}
                        
                      <td>
                    <tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <br>
          <footer class="panel-footer">
            <div class="row">
              <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
              </div>
              <div class="col-sm-7 text-right text-center-xs">                
                  {{ $response->links() }}      
              </div>        
            </div>
          </footer>
        </div>
   
      @else
        
        <p class="text-lg-center" style="padding-top: 3rem;"><i>You have No Intending Agents Yet...</i></p>

      @endif
    </div>
    <br>
  </div>
@endsection