@extends('Frontend.master')
@section('contents')


<div class="content-area">
    <div class="container">
        <div class="checkout-page">
            <h2>Checkout this process</h2>
            <div class="checkout-top-ok">
                <span id="check-one-top">1</span><span class="check-dots">.....</span>
                <span id="check-two-top">2</span><span class="check-dots">.....</span>
                <span id="check-three-top">3</span>
            </div>
            <form action="{{route('product.order.confirm',$product->id)}}" method="POST" class="form-horizontal"
                role="form" id="checkoutForm">

                <div id="check1">
                    <h3>Basic Informations</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="checkoutEmail">Email: *</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control inputs" id="checkoutEmail" placeholder="Enter email"
                                required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="checkoutContact">Contact: *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control inputs" id="checkoutContact"
                                placeholder="01951233084 or +8801951233084" required />
                            <span class="input-hint">Phone number must be a Bangladeshi number like +8801951233084
                                or 01951233084 [Only for test and you can add your regexp and make it
                                difference]</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input type="button" class="btn btn-info pull-right  margin-top-20 checkbtn1"
                                name="submit_check1" value="Next..." />
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div> <!-- End check1 -->



                <div id="check2" class="hidden">

                    <h3>Shipping Address Informations</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_name">Shipping Name: *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control inputs" id="shipping_name" value="Maniruzzaman Akash"
                                placeholder="Enter Your Shipping Name" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_primary_address">Shipping
                            Address: *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control inputs" id="shipping_primary_address"
                                placeholder="Enter Your Shipping primary Address" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="shipping_nearest_city">Select Nearest state:
                            *</label>
                        <div class="col-sm-10">
                            <select name="state" class="form-control inputs" id="shipping_nearest_city" required>
                                <option value="">Select a City</option>
                                <option value="London">London</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Patuakhali">Patuakhali</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input type="button" class="btn btn-info pull-right  margin-top-20 checkbtn2"
                                name="submit_check2" value="Next..." />

                            <input type="button"
                                class="btn btn-danger pull-right  margin-top-20 margin-right-20 backToCheck1"
                                name="backToCheck1" value="Back" />
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div> <!-- End check2 -->
                <div id="check3" class="hidden">

                    <h3>Payment Method Informations</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="address_primary">Select Payment Option: *</label>
                        <div class="col-sm-10">
                            <select name="payments" id="payments" class="form-control inputs" required>
                                <option value="">Select A payment method</option>

                                <option value="payment_bkash">Bkash</option>
                            </select>
                            <div class="payment-div payment-div-bkash hidden">
                                <i>Bkash</i> <br />
                                <a href="bkash.php?id=test" class="btn btn-lg btn-yellow">Payment Via Bkash Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input type="submit" class="btn btn-info pull-right  margin-top-20" name="submit_check1"
                                value="Finish Order" />
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div> <!-- End check3 -->

            </form>
        </div>
        <!--End Checkout page -->
    </div> <!-- End Container -->


</div> <!-- End content Area class -->




@endsection