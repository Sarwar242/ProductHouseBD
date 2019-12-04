@extends('Frontend.layouts.master')
@section('contents')
<!----------------------------Single Product------------------------>

<div class="header">
    <h2>Order Details</h2><br>
    <a href="{{route('dynamic.pdf.generate')}}" class="btn btn-danger">Convert inTo PDF</a>

</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Address
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($order_details as $order_detail)
            <tr>
                <td>{{$order_detail->name}}</td>
                <td>{{$order_detail->phone}}</td>
                <td>{{$order_detail->shipping_address}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection