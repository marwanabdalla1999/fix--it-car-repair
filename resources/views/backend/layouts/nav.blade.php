@section('nav')
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <center><img src="{{asset('assets/backend/build/images/logo.png')}}"  class="site_title"  /> </center>
                <hr style="background-color:black;"/>
            </div>


            <div class="clearfix"></div>

            <br/>
            <br/>
            <br/>

            <br/>

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li><a><i class="fa fa-folder"></i> Admins <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-admin')}}">Add Admin</a></li>
                                <li><a href="{{route('show-admin')}}">Show Admins</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-folder"></i> technicians <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">

                                <li><a href="{{route('add-technicians')}}">Add technician</a></li>
                                <li><a href="{{route('show-technicians')}}">Show technicians</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-folder"></i> Orders <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('getorders')}}">Orders in progress</a></li>
                                <li><a href="{{route('getorders')}}">All Orders</a></li>

                            </ul>
                        </li>




                        <li><a><i class="fa fa-folder"></i> Users <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('getusers')}}">Show Users</a></li>
                                <li><a href="{{route('getusers')}}">Find User</a></li>
                            </ul>
                        </li>







                    </ul>
                </div>

            </div>





        </div>
    </div>

@stop
