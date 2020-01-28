<!--sidebar-menu-->
<div id="sidebar">
    <a href="{{route('homeadmin')}}" class="visible-phone">
        <i class="icon icon-home"></i> Dashboard</a>

    <ul>
        <li class="@yield('act','inactive')"><a href="{{route('homeadmin')}}"><i class="icon icon-home"></i>
                <span>Dashboard</span></a> </li>
        <li class="submenu @yield('act2','inactive')"> <a href="#"><i class="icon icon-th-list"></i>
                <span>Categories</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a href="{{route('admin.addCategory')}}">Add</a></li>
                <li><a href="{{route('admin.viewCategories')}}">View</a></li>
            </ul>
        </li>
        <li class="submenu @yield('act2.2','inactive')"> <a href="#"><i class="icon icon-th-list"></i>
                <span>Sub Categories</span> <span class="label label-important">2</span></a>
            <ul>
                <li><a href="{{route('admin.addSubCategory')}}">Add</a></li>
                <li><a href="{{route('admin.viewSubCategories')}}">View</a></li>
            </ul>
        </li>
        <li class="submenu @yield('act3','inactive')"> <a href="#"><i class="icon icon-th-list"></i>
                <span>Products</span> <span class="label label-important">{{$pronum ?? '' }}</span></a>
            <ul>
                <li><a href="{{route('admin.addProduct')}}">Add</a></li>
                <li><a href="{{route('admin.viewProducts')}}">View</a></li>
            </ul>
        </li>
        <li class="submenu @yield('act4','inactive')"> <a href="#"><i class="icon icon-th-list"></i>
                <span>Orders</span> <span class="label label-important">0</span></a>
            <ul>
                <li><a href="{{route('admin.orders')}}">View</a></li>
                <li><a href="{{route('admin.viewOrders')}}">Delivered</a></li>
            </ul>
        </li>
        <li class="submenu @yield('act5','inactive')">
            <a href="#"><i class="icon icon-th-list"></i>
                <span>Admins</span></a>
            <ul>
                <li><a href="{{route('admin.addAdmin')}}">Add New Admin</a></li>
                <li><a href="{{route('admin.admins')}}">Admins</a></li>
            </ul>
        </li>
        <li class="submenu @yield('act6','inactive')"> <a href="#"><i class="icon icon-th-list"></i>
                <span>Users</span> <span class="label label-important">0</span></a>
            <ul>
                <li><a href="{{route('admin.users')}}">Users</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->