@extends('Backend.layouts.admin_design')
@section('act7')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a> <a href="#">Sliders</a> <a href="#" class="current">View Sliders</a> </div>
        <h1>Sliders</h1>

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
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Sliders List</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table id="dataTable" class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Slider Title</th>
                                    <th>Slider Image</th>
                                    <th>Priority</th>
                                    <th>Product</th>
                                    <th>Button Text</th>
                                    <th>Button Link</th>
                                    <th style="width:70px;">Action(s)</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($sliders as $slider)

                                <tr class="gradeX">
                                    <td style="width:50px;">{{$loop->index+1}}</td>
                                    <td>{{$slider->title}}</td>
                                    <td class="text-center" style="width:80px;">
                                        <img class="rounded-circle"
                                            src="{{ asset('storage')}}/{{ ($slider->image) }}" />
                                    </td>

                                    <td>{{$slider->priority}}</td>

                                    @if(!is_null($slider->product_id))
                                    <td>{{$slider->product->product_name}} </td>
                                    @else
                                    <td>&nbsp &nbsp</td>
                                    @endif

                                    <td>{{$slider->button_text}}</td>
                                    <td>{{$slider->button_link}}</td>

                                    <td class="center"> <a href="{{route('admin.slider.edit',$slider->id)}}"
                                            class="btn btn-primary btn-mini">Edit</a>

                                        <a href="{{route('admin.slider.delete',$slider->id)}}"
                                            data-confirm="Are you sure to delete this slide?"
                                            class="delete btn btn-danger btn-mini">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection