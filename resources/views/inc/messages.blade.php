<br>
@if (count($errors) > 0)
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      @foreach($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
        {{$error}}
      </div>
    @endforeach
    </div>
    <div class="col-md-2"></div>
  </div>

@endif
      
@if (session('success'))
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      {{session('success')}}
    </div>
    </div>
    <div class="col-md-2"></div>
  </div>
@endif

@if (session('error'))
    <div class=" alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
       {{session('error')}}
    </div>
@endif
