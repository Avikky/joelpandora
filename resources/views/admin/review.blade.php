
@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="panel panel-default">
      @if (count($reviews) > 0)

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
                  <th>Company</th>
                  <th>Phone</th>
                  <th>Feedback</th>
                  <th>Satisfied</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($reviews as $review)
                    <tr>
                    <td>{{$review->name}}</td>
                    <td><span class="text-ellipsis">{{$review->company_name}}</span></td>
                    <td><span class="text-ellipsis">{{$review->phone}}</span></td>
                    <td><span class="text-ellipsis">{!! substr($review->feedback,0,50) !!}</span></td>
                    <td><span class="text-ellipsis"> {{ $review->satisfied }} </span></td>
                    <td style="desplay:flex;">
                        <a href="#editModal{{$review->id}}"  class=" mb-1" data-toggle="modal" data-target="#editModal{{$review->id}}"><i class="fa fa-edit text-success text-active"></i></a> 

                        {{-- Edit Modal is here --}}
                            
                        <div class="modal fade" id="editModal{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Edit Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                {{ Form::open(['action' => ['ReviewController@update', $review->id], 'method' => 'POST']) }}

                                    {{Form::hidden('_method', 'PUT')}}

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $review->name }}" id="" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="service">Phone</label>
                                        <input type="text" name="phone" value="{{ $review->phone }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="service">Company</label>
                                        <input type="text" name="company_name" value="{{ $review->company_name }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="service">Staff Position in the Company</label>
                                        <input type="text" name="position" value="{{ $review->company_name }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="service">Satisfaction</label>
                                            <input type="text" name="satisfied" value="{{ $review->satisfied }}" id="" class="form-control">
                                        </div>
                                    <div class="form-group">
                                        <label for="name">Review</label>
                                        <textarea name="feedback" class="ckeditor" cols="30" rows="10">
                                            {!! $review->feedback !!}
                                        </textarea>
                                     </div>  
                                    
                                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                {{ Form::close() }}
                                </div>
                            </div>
                            </div>
                        </div>

                        {{-- Edit Modal ends --}}




                      {{ Form::open(['action' => ['ReviewController@destroy', $review->id], 'method' => 'POST', 'class' => 'float-right']) }}
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
                  {{ $reviews->links() }}      
              </div>        
            </div>
          </footer>
        </div>
   
      @else
        
        <p class="text-lg-center" style="padding-top: 3rem;"><i>You have No Post Yet...</i></p>

      @endif
    </div>
    <br>
  </div>
@endsection