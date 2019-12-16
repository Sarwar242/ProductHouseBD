@extends('Backend.layouts.admin_design')
@section('content')
<link rel="stylesheet" href="{{ asset('css/backend_css/profile.css')}}" />
<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{ asset('storage')}}/{{ ($admin->avatar) }}" alt="" />
                    <!-- <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file" />
                    </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$admin->name}}
                    </h5>
                    <h6>
                        {{$admin->type}}
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2" style="float:right">
                <a class="profile-edit-btn" href="{{route('admin.editProfile')}}" name="btnAddMore">Edit Profile</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>Contact Details</p>
                    <h4>Name: &nbsp&nbsp<a href="#">{{$admin->name}}</a></h4><br />
                    <h4>Email: &nbsp&nbsp<a href="#">{{$admin->email}}</a></h4><br />
                    <h4>Phone: &nbsp&nbsp<a href="#">{{$admin->phone_no}}</a></h4>

                </div>
            </div>
        </div>
    </form>
</div>

@endsection