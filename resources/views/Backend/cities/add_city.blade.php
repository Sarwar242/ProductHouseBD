@extends('Backend.layouts.admin_design')
@section('act2.1')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a> <a href="#">Cities</a> <a href="#" class="current">Add Cities</a> </div>
        <h1>Cities</h1>

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
                        <h5>Add City</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{route('admin.addCity.store')}}"
                            name="add_city" id="add_city" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">City Name</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Shipping Cost</label>
                                <div class="controls">
                                    <input type="number" name="shipping_cost">
                                </div>
                            </div>
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