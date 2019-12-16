@extends('Backend.layouts.admin_design')
@section('act2')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a> <a href="#">Categories</a> <a href="#" class="current">Edit Category</a> </div>
        <h1>Categories</h1>

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
                        <h5>Edit Category</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post"
                            action="{{route('admin.editCategory.update',$category->id)}}" name="edit_category"
                            id="edit_category" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Category Name</label>
                                <div class="controls">
                                    <input type="text" value="{{$category->name}}" name="name" id="category_name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Category Description</label>
                                <div class="controls">
                                    <textarea type="text" name="description" id="description"
                                        rows="5">{{$category->description}}</textarea>
                                </div>
                            </div>

                            <div class="control-group d-flex flex-column">
                                <label class="control-label">Category Image</label> <span class="text-center"
                                    style="padding-left:40px; height:40px; width:180px; !important ">
                                    <img class="rounded-circle"
                                        src="{{ asset('storage')}}/{{ ($category->image) }}" /></span>
                            </div>

                            <div class="control-group d-flex flex-column">
                                <label class="control-label">New Image</label>
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
                            <div class="form-actions" style="float:right ">
                                <input type="submit" value="Update" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection