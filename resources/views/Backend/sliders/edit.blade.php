@extends('Backend.layouts.admin_design')

@section('act7')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a> <a href="#">Sliders</a> <a href="#" class="current">Edit Slider</a> </div>
        <h1>Slider</h1>

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
                        <h5>Edit Slider</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post"
                            action="{{route('admin.slider.update',$slider->id)}}" enctype="multipart/form-data"
                            novalidate="novalidate">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Slider Title</label>
                                <div class="controls">
                                    <input type="text" name="title" value="{{$slider->title}}" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product Link</label>
                                <select name="product_id" style="margin:20px;">
                                    @if(!is_null($slider->product_id))
                                    @foreach($products as $product)
                                    @if($slider->product->id==$product->id)
                                    <option value="{{ $product->id }}" selected>
                                        {{$product->product_name}}</option>
                                    @else
                                    <option value="{{ $product->id }}">
                                        {{ $product->product_name}}</option>
                                    @endif
                                    @endforeach
                                    @else
                                    <option value="" selected='selected' disabled>
                                        Select a product to link with the slider</option>
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->product_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Slider Button Text</label>
                                <div class="controls">
                                    <input type="text" name="button_text" value="{{$slider->button_text}}">
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Slider Link</label>
                                <div class="controls">
                                    <input type="text" name="button_link" value="{{$slider->button_link}}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Slider Priority</label>
                                <div class="controls">
                                    <input type="number" name="priority" id="priority" value="{{$slider->priority}}">
                                </div>
                            </div>
                            <div class="control-group d-flex flex-column">
                                <h1 style="padding-left: 40px;">Slider Image: </h1><span class="text-center"
                                    style=" height:40px; width:180px; ">
                                    <img class="rounded-circle"
                                        src="{{ asset('storage')}}/{{ ($slider->image) }}" /></span>
                            </div>
                            <div class="control-group d-flex flex-column">

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