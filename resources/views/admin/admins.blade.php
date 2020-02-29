@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-8" >
            <div class="card-header text-center"><h3>Registered Admin</h3></div>
                <div class="card-body">
                    @if (count($admins) > 0)
                        <div class="table-responsive">
                           <table class="table table-striped  b-t b-light">
                               <thead>
                                   <tr>
                                   <th>Image</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   </tr>
                               </thead>
                               <tbody>
                               @foreach ($admins as $user)
                                   <tr>
                                       <td><img style="border: 1px solid blue; border-radius:50%;  width: 3.6rem; height: 3.6rem;" src="{{ asset('storage/partner_images') }}/{{$user->profile_image}}"> </td>
                                       <td><span class="text-ellipsis">{{$user->name}}</span></td>
                                   <td style="desplay:flex;">{{$user->email}}<td>
                                   <tr>
                               @endforeach
                               </tbody>
                           </table>
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