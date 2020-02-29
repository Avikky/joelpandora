@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="card">
      <h3 class="card-header text-center">General Site Settings</h3> 
      <div class="justify-content-center card-body">
         @if ($feature)
      <form action="{{ route('updateSettings', ['id' => 1]) }}" method="POST" class="row">
               @csrf
               <input type="hidden" name="_method" value="PUT">
               <div class="col-md-6">
                  <div class="form-group"  >
                     <label for="site_name">Site Name</label>
                     <input type="text" name="site_name" value="{{$feature->site_name}}" class="form-control" required>
                  </div>
   
                  <div class="form-group"  >
                     <label for="slogan">Slogan</label>
                     <input type="text" name="slogan" value="{{$feature->slogan}}" class="form-control" required>
                  </div>
   
                  <div class="form-group"  >
                     <label for="email">Email</label>
                     <input type="email" name="email" value="{{$feature->email}}" class="form-control" required>
                  </div>
   
                  <div class="form-group">
                     <label for="phone">Phone</label>
                     <input type="text" name="phone" value="{{$feature->phone}}" class="form-control" required>
                  </div>
   
                  <div class="form-group">
                     <label for="address">Address</label>
                  <input type="text" name="address" value="{{$feature->address}}" class="form-control" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="mission">Mission</label>
                     <textarea name="mission" required  class="form-control" cols="10" rows="2">
                        {{$feature->mission}}
                     </textarea>
                  </div>
   
                  <div class="form-group">
                     <label for="mission">Vision</label>
                     <textarea name="vision" required  class="form-control" cols="10" rows="2">
                        {{$feature->vision}}
                     </textarea>
                  </div>
   
                  <div class="form-group">
                     <label for="about">About us</label>
                     <textarea name="about" required  class="form-control ckeditor" cols="10" rows="2">
                        {{$feature->about}}
                     </textarea>
                  </div>
               </div>
               <input type="submit" value="Update" class="btn btn-primary">
            </form>
         @else
            <form action="{{route('storeSettings')}}" method="POST" class="row">
               @csrf
               <div class="col-md-6">
                  <div class="form-group"  >
                     <label for="site_name">Site Name</label>
                     <input type="text" name="site_name" class="form-control" required>
                  </div>

                  <div class="form-group"  >
                     <label for="slogan">Slogan</label>
                     <input type="text" name="slogan" class="form-control" required>
                  </div>

                  <div class="form-group"  >
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                  </div>

                  <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                  </div>

                  <div class="form-group">
                     <label for="address">Address</label>
                     <input type="text" name="address" class="form-control" required>
                  </div>
                  
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="mission">Mission</label>
                     <textarea name="mission" required  class="form-control" cols="10" rows="2">
                     </textarea>
                  </div>

                  <div class="form-group">
                     <label for="vision">Vision</label>
                     <textarea name="vision" required  class="form-control" cols="10" rows="2">
                     </textarea>
                  </div>

                  <div class="form-group">
                     <label for="about">About us</label>
                     <textarea name="about" required  class="form-control ckeditor" cols="10" rows="2">
                     </textarea>
                  </div>
               </div>
               <input type="submit" value="Submit" class="btn btn-primary">
            </form>
         @endif
      </div>
   </div>
</div>
@endsection
 