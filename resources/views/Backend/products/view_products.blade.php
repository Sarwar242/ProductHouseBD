@extends('Backend.layouts.admin_design')
@section('act3')
active
@endsection
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">View Products</a> </div>
        <h1>Products</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Products List</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table id="dataTable" class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Products Serial</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Action(s)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $i=0; @endphp
                                @foreach($products as $product)
                                @php $i++; @endphp
                                <tr class="gradeX">
                                    <td>{{$i}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_code}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->subcategory->name}}</td>
                                    <td>{{$product->product_details}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td>{{$product->product_discount}}</td>
                                    <td class="center"> <a href="{{route('admin.editproduct',$product->id)}}"
                                            class="btn btn-primary btn-mini">Edit</a>

                                        <a href="{{route('admin.deleteProduct',$product->id)}}"
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