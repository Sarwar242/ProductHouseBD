@extends('Backend.layouts.admin_design')
@section('act2.2')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a> <a href="#">Sub-Categories</a> <a href="#" class="current">Add Sub-Categories</a> </div>
        <h1>Sub-Categories</h1>

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
                        <h5>Add Sub-Categories</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{route('admin.addSubCategory.store')}}"
                            name="add_category" id="add_category" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Sub-Categories Name</label>
                                <div class="controls">
                                    <input type="text" name="name" id="category_name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Category</label>
                                <select name="category_id" style="margin:20px;">
                                    <option value="" selected='selected' disabled>
                                        Select a Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Sub-Categories Description</label>
                                <div class="controls">
                                    <textarea type="text" name="description" id="description" rows="5"> </textarea>
                                </div>
                            </div>

                            <div class="control-group d-flex flex-column">
                                <label class="control-label">Sub-Categories Image</label>
                                <input type="file" name="image" class="py-10 pl-10" style="margin:20px;">
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
