@extends('layouts.app')

@section('content')
  <div class="title" style="padding: 1.5rem;">
    <a href="{{ route('listPages')}}" class="btn btn-success">Back</a>
    <br><br>
    <div>
    </div>
    <div class="container" id="app">
    <form action="{{route('newPage')}}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
            <button class="btn btn-primary float-right" type="submit">Launch Page</button>
        </div>

        <br><br>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="name">Page Name: </label>
              <input type="input" id="pageName" name="page_name" placeholder="" value="{{$page->page_name}}"  class="form-control">
              </div>
              <div class="form-group">
                <label for="name">Page Title: </label>
                <input type="input" name="page_title" placeholder="" value="{{$page->page_title}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="name">Do you want a page banner</label>
                <select name="" class="form-control selectBanner">
                    @if ($page->banner );
                        
                    @endif
                  <option value="default">Use Default</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
              <div class="form-group banner-div">
              </div>
              <div class="form-group">
                <label for="article_title">Article title</label>
                 <input type="text" class="form-control" name="article_title">
              </div>
              <div class="form-group">
                <label for="">Article</label>
                <textarea name="article" class="ckeditor" cols="30" rows="10"></textarea>
              </div>
              <button class="btn btn-primary link-btn">Add link to page</button>
              <p class="link-box form-group"></p>
            </div>
            {{-- <div class="col-md-6">
            <iframe src="{{ url ('http://localhost/general_admin/public/pages/yardley-arnold')}}" width="100%" height="700px">
                  <p>Your browser does not support iframes.</p>
                </iframe>
            </div> --}}
          </div>
      </form>
    </div>
  </div>
<script>
  var bannerSelect = document.querySelector('.selectBanner');
  var bannerDiv = document.querySelector('.banner-div');
  var linkBtn = document.querySelector('.link-btn');
  var linkBox = document.querySelector('.link-box');
  console.log(bannerSelect.value);
  bannerSelect.addEventListener('change', getSelectedValue);
  linkBtn.addEventListener('click', provideLinkBox);
  function getSelectedValue (e) {
    console.log(e.target.value)
    if(e.target.value == 'Yes'){
      bannerDiv.innerHTML = '<label for="banner_img">Banner Image<input type="file" name="banner" class="form-control banner-img"></label>';
    }else{
     bannerDiv.innerHTML = "";
    }
  }

  function provideLinkBox(e){
    e.preventDefault()
    console.log(e.target.textContent)
    if(e.target.textContent == 'Add link to page'){
      e.target.textContent = 'Remove Link';
      linkBox.innerHTML = '<input class="form-control" name="links" type="text" placeholder="Enter Link">' + 
      '<input class="form-control" name="link_name" type="text" placeholder="Enter Link Name/Title">'
      +
    '<label>Enter the position of the link</label><select name="link-position" class="col-md-6 form-control"><option value="top">Top</option><option value="buttom">Bottom</option><option value="before article">Before article</option><option value="after article">After article</option><option value="inside banner">Inside Banner</option></select>'
    }else if( e.target.textContent == 'Remove Link'){
      e.target.textContent = 'Add link to page'
      linkBox.innerHTML = "";
    }

  }

</script>
@endsection