@extends('Frontend.layouts.master')
@section('contents')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/profile.css') }}">
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{ asset('images/Skech.png')}}" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{$user->name}}
                    </div>
                    <div class="profile-usertitle-job">
                        Male
                    </div>
                </div>

                <div class="profile-usertitle-job" >
                    <a style="color:black;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                    </form>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                        </li>

                        <li>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Orders </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Carts </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                Email : {{$user->email}}
            <hr><br>
                <h1>Notifications:</h1>
                <hr>
                @foreach ($user->notifications as $notification)
                    @php
                        echo $notification->data['message'];
                        //echo implode("\n",$notification->data);

                        // For those that might come looking...like me

                        // echo implode("\n",$array);
                        // else if its multidimensional array

                        // echo implode("\n",array_collapse($array));
                    @endphp
                    <hr>
                @endforeach
                @php
                    $user->unreadNotifications->markAsRead();
                @endphp
            </div>
        </div>
    </div>
</div>
@endsection
