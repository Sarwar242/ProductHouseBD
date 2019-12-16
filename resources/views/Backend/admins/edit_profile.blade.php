@extends('Backend.layouts.admin_design')
@section('content')
<link rel="stylesheet" href="{{ asset('css/backend_css/profile.css')}}" />
<div class="container emp-profile">
    <form method="post" action="{{route('admin.profileUpdate')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{ asset('storage')}}/{{ ($admin->avatar) }}" alt="" />
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="avatar" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>Contact Details</p>
                    <h4>Name: &nbsp&nbsp</h4><input type="text" name="name" value="{{$admin->name}} "><br />
                    <h4>Email: &nbsp&nbsp</h4><input type="email" name="email" value="{{$admin->email}}"><br />
                    <h4>Phone No: &nbsp&nbsp</h4><input type="text" name="phone" value="{{$admin->phone_no}}"><br />

                    <h4>Type: &nbsp&nbsp</h4>
                    <select name="type" style="margin:20px;">
                        <option value="{{$admin->type}}" selected disabled>
                            {{$admin->type}}</option>

                        <option value="Admin">Admin
                        </option>
                        <option value="Super Admin">Super Admin
                        </option>

                    </select><br />
                </div>
            </div>
            <div class="col-md-2" style="float:right">
                <input type="submit" class="profile-edit-btn" style="padding:10px" value="Update Profile" />
            </div>
        </div>

    </form>
</div>

@endsection