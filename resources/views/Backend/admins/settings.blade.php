@extends('Backend.layouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a> <a href="#" class="current">Settings</a> </div>
        <h1>Settings</h1>
    </div>
    <div class="container-fluid">
        <hr>

        <div class="row-fluid">

            <div class="row-fluid">
                <div class="span12" style="opacity:1;">
                    <div class="widget-box">

                        @if(Session::has('flash_message_error'))

                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">
                                x
                            </button>
                            <strong>
                                {!! session('flash_message_error') !!}
                            </strong>
                        </div>

                        @endif
                        @if(Session::has('flash_message_success'))

                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">
                                x
                            </button>
                            <strong>
                                {!! session('flash_message_success') !!}
                            </strong>
                        </div>

                        @endif

                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Update Password</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{route('admin.updatePassword')}}">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label">Current Password</label>
                                    <div class="controls">
                                        <input type="password" name="current_pwd" required />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">New Password</label>
                                    <div class="controls">
                                        <input type="password" name="password" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Confirm Your New password</label>
                                    <div class="controls">
                                        <input type="password" name="password_confirmation" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Update Password" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
