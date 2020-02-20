@extends('Backend.layouts.admin_design')
@section('act2.1')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">View Cities</a> </div>
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
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Cities List</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table id="dataTable" class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>City Serial</th>

                                    <th>Name</th>
                                    <th>Shipping Cost</th>

                                    <th>Action(s)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($cities as $city)
                                <tr class="gradeX">
                                    <td style="width:50px;">{{$loop->index+1}}</td>

                                    <td>{{$city->name}}</td>
                                    <td>{{$city->shipping_cost}}</td>

                                    <td class="center"> <a href="{{route('admin.editCity',$city->id)}}"
                                            class="btn btn-primary btn-mini">Edit</a>

                                        <a href="{{route('admin.deleteCity',$city->id)}}"
                                            data-confirm="Are you sure to delete this item?"
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
<script>
var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
</script>
@endsection