@extends('Backend.layouts.admin_design')

@section('act3')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a> <a href="#">Products</a> <a href="#" class="current">Edit Product</a> </div>
        <h1>Edit Product</h1>

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
                        <h5>Edit Product</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post"
                            action="{{route('admin.editproduct.update',$product->id)}}" name="add_category"
                            id="add_category" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Product Name</label>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$product->product_name }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Code</label>
                                <div class="controls">
                                    <input type="text" name="code" value="{{$product->product_code}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Category</label>
                                <select name="category" style="margin:20px;">
                                    <option value="$product->category->id" selected='selected' disabled>
                                        {{$product->category->name}}</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product Description</label>
                                <div class="controls">
                                    <textarea type="text" name="description" id="description"
                                        rows="5">{{$product->product_details}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Price</label>
                                <div class="controls">
                                    <input type="number" step="0.01" name="price" id="price"
                                        value="{{$product->product_price}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Discount</label>
                                <div class="controls">
                                    <input type="number" step="0.01" name="discount" id="discount"
                                        value="{{$product->product_discount}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Quantity</label>
                                <div class="controls">
                                    <input type="number" name="quantity" value="{{$product->product_quantity}}"
                                        id="quantity">
                                </div>
                            </div>
                            <div class="control-group d-flex flex-column">
                                <label class="control-label">Product Image</label>
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
                            <div class="form-actions" style="float:right">
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