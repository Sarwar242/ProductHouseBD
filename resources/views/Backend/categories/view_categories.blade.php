@extends('Backend.layouts.admin_design')
@section('act2')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">View Categories</a> </div>
        <h1>Categories</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Categories List</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Category Serial</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>

                                    <th>Action(s)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $i=0; @endphp
                                @foreach($categories as $category)
                                @php $i++; @endphp
                                <tr class="gradeX">
                                    <td style="width:50px;">{{$i}}</td>
                                    <td class="text-center" style="width:80px;">
                                        <img class="rounded-circle"
                                            src="{{ asset('storage')}}/{{ ($category->image) }}" />
                                    </td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>

                                    <td class="center"> <a href="{{route('admin.editcategory',$category->id)}}"
                                            class="btn btn-primary btn-mini">Edit</a>

                                        <a href="{{route('admin.deleteCategory',$category->id)}}"
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