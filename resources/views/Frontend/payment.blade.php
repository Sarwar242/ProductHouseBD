<div class="form-group row">
    <label for="payment_method" class="col-md-4 col-form-label text-md-right">
        Payment Method:
    </label>
    <div class="col-md-6">
        <select class="form-control appearance" style="border-radius: 15px !important;" name="payment_method"
            id="payment_method" required>
            <option value="">Select a Payment Method please</option>
            @foreach($payments as $payment)
            <option value="{{$payment->short_name}}">{{$payment->name}}</option>
            @endforeach
        </select>
        @foreach($payments as $payment)

        @if($payment->short_name=="cash_on_delivery")
        <div id="payment_{{$payment->short_name}}" class="alert alert-success text-center mt-2 hidden"
            style="margin-left:35px;">
            <div>
                <h3>
                    For Cash on Delivery there is nothing necessary.
                    Just click Finish Order.</h3>
                <br>
                <small>You will get your product very soon.</small>
            </div>
        </div>
        @else
        <div id="payment_{{$payment->short_name}}" class="alert alert-success text-center mt-2 hidden"
            style="margin-left:35px;">
            <div>
                <h3>{{$payment->name}} Payment</h3>
                <p>
                    <strong>{{$payment->name}} No: {{$payment->no}}</strong>
                    <br>
                    <strong>Account Type: {{$payment->type}}</strong>
                </p>
                <div class="alert alert-success">
                    Please send the payment to this Number and write transaction code below.
                </div>
            </div>
        </div>
        @endif
        @endforeach
        <input type="text" name="transaction_id" id="transaction_id"
            style="margin-left:40px !important;width:90% !important;border-radius: 15px !important;"
            class="form-control hidden" placeholder="Transaction ID">

    </div>
</div>
<input class="hidden" type="text" name="cost" value="{{$total}}">
<div class="form-group row mb-0" style="margin-left:35px;">
    <div class="col-md-6 offset-md-4">
        <button class="btn btn-primary">
            Order Now
        </button>
    </div>
</div>



@section('script')
<script type="text/javascript">
$("#payment_method").change(function() {
    $payment_method = $("#payment_method").val();

    if ($payment_method == "cash_on_delivery") {
        $("#payment_cash_on_delivery").removeClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#transaction_id").addClass('hidden');
    } else if ($payment_method == "bkash") {
        $("#payment_cash_on_delivery").addClass('hidden');
        $("#payment_bkash").removeClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#transaction_id").removeClass('hidden');
    } else if ($payment_method == "rocket") {
        $("#payment_rocket").removeClass('hidden');
        $("#payment_cash_on_delivery").addClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#transaction_id").removeClass('hidden');
    }

});
</script>
@endsection