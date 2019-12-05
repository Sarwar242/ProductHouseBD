@extends('Backend.layouts.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">

    <!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                <h5>Site Analytics</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span9">
                        <div class="chart"></div>
                    </div>
                    <div class="span3">
                        <ul class="site-stats">
                            <li class="bg_lh"><i class="icon-user"></i> <strong>2540</strong> <small>Total Users</small>
                            </li>
                            <li class="bg_lh"><i class="icon-plus"></i> <strong>120</strong> <small>New Users </small>
                            </li>
                            <li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>656</strong> <small>Total
                                    Shop</small></li>
                            <li class="bg_lh"><i class="icon-tag"></i> <strong>9540</strong> <small>Total Orders</small>
                            </li>
                            <li class="bg_lh"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending
                                    Orders</small></li>
                            <li class="bg_lh"><i class="icon-globe"></i> <strong>8540</strong> <small>Online
                                    Orders</small></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End-Chart-box-->
    <hr />
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i
                            class="icon-chevron-down"></i></span>
                    <h5>Latest Posts</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG2">
                    <ul class="recent-posts">
                        <li>
                            <div class="user-thumb"> <img width="40" height="40" alt="User"
                                    src="{{asset('images/backend_images/demo/av1.jpg')}}"> </div>
                            <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 /
                                    Time:09:27 AM </span>
                                <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple
                                        paragraphs and is full of waffle to pad out the comment.</a> </p>
                            </div>
                        </li>
                        <li>
                            <div class="user-thumb"> <img width="40" height="40" alt="User"
                                    src="{{asset('images/backend_images/demo/av2.jpg')}}"> </div>
                            <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 /
                                    Time:09:27 AM </span>
                                <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple
                                        paragraphs and is full of waffle to pad out the comment.</a> </p>
                            </div>
                        </li>
                        <li>
                            <div class="user-thumb"> <img width="40" height="40" alt="User"
                                    src="{{asset('images/backend_images/demo/av4.jpg')}}"> </div>
                            <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 /
                                    Time:09:27 AM </span>
                                <p><a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad
                                        out the comment.</a> </p>
                            </div>
                        <li>
                            <button class="btn btn-warning btn-mini">View All</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
                    <h5>To Do list</h5>
                </div>
                <div class="widget-content">
                    <div class="todo">
                        <ul>
                            <li class="clearfix">
                                <div class="txt"> Luanch This theme on Themeforest <span class="by label">Alex</span>
                                </div>
                                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i
                                            class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i
                                            class="icon-remove"></i></a> </div>
                            </li>
                            <li class="clearfix">
                                <div class="txt"> Manage Pending Orders <span
                                        class="date badge badge-warning">Today</span> </div>
                                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i
                                            class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i
                                            class="icon-remove"></i></a> </div>
                            </li>
                            <li class="clearfix">
                                <div class="txt"> MAke your desk clean <span class="by label">Admin</span></div>
                                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i
                                            class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i
                                            class="icon-remove"></i></a> </div>
                            </li>
                            <li class="clearfix">
                                <div class="txt"> Today we celebrate the theme <span
                                        class="date badge badge-info">08.03.2013</span> </div>
                                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i
                                            class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i
                                            class="icon-remove"></i></a> </div>
                            </li>
                            <li class="clearfix">
                                <div class="txt"> Manage all the orders <span
                                        class="date badge badge-important">12.03.2013</span> </div>
                                <div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i
                                            class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i
                                            class="icon-remove"></i></a> </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="widget-box widget-chat">
                <div class="widget-title bg_lb"> <span class="icon">
                        <i class="icon-comment"></i> </span>
                    <h5>Chat Option</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG4">
                    <div class="chat-users panel-right2">
                        <div class="panel-title">
                            <h5>Online Users</h5>
                        </div>
                        <div class="panel-content nopadding">
                            <ul class="contact-list">
                                <li id="user-Alex" class="online"><a href=""><img alt=""
                                            src="{{asset('images/backend_images/demo/av1.jpg')}}" />
                                        <span>Alex</span></a></li>
                                <li id="user-Linda"><a href=""><img alt=""
                                            src="{{asset('images/backend_images/demo/av2.jpg')}}" />
                                        <span>Linda</span></a></li>
                                <li id="user-John" class="online new"><a href=""><img alt=""
                                            src="{{asset('images/backend_images/demo/av3.jpg')}}" />
                                        <span>John</span></a><span class="msg-count badge badge-info">3</span></li>
                                <li id="user-Mark" class="online"><a href=""><img alt=""
                                            src="{{asset('images/backend_images/demo/av4.jpg')}}" />
                                        <span>Mark</span></a></li>
                                <li id="user-Maxi" class="online"><a href=""><img alt=""
                                            src="{{asset('images/backend_images/demo/av5.jpg')}}" />
                                        <span>Maxi</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-content panel-left2">
                        <div class="chat-messages" id="chat-messages">
                            <div id="chat-messages-inner"></div>
                        </div>
                        <div class="chat-message well">
                            <button class="btn btn-success">Send</button>
                            <span class="input-box">
                                <input type="text" name="msg-box" id="msg-box" />
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!--end-main-container-part-->
@endsection