@extends('Backend.layouts.admin_design')

@section('act5')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('homeadmin')}}" title="Go to Home" class="tip-bottom"><i
                    class="icon-home"></i>
                Home</a> <a href="#">Admins</a> <a href="#" class="current">Add New Admin</a> </div>
        <h1>Admins</h1>

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
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Add Admin</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{route('admin.addAdmin.create')}}"
                            name="add_admin" id="add_admin" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Admin Name</label>
                                <div class="controls">
                                    <input type="text" name="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Admin Email</label>
                                <div class="controls">
                                    <input type="text" name="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Admin Type</label>
                                <select name="type" style="margin:20px;">
                                    <option value="Super Admin" selected='selected' disabled>
                                        Super Admin</option>
                                    <option value="Admin">
                                        Admin</option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Admin Phone</label>
                                <div class="controls">
                                    <input type="text" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Admin Password</label>
                                <div class="controls">
                                    <input type="text" name="password" id="password">
                                </div>
                            </div>


                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-actions">
                                <input type="submit" value="Confirm" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
