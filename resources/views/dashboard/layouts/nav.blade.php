@section('nav')
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="#" class="site_title"><i class="fa fa-user"></i> <span>{{Auth::guard('doctor')->user()->name}}</span></a>
            </div>

            <div class="clearfix"></div>

            <div class="profile clearfix">
                <div class="profile_pic">

                </div>

            </div>
            <br/>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">

                        <li><a><i class="fa fa-folder"></i>Prescription <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('show-prescription')}}">show prescription</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-folder"></i>chat<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="">show chat</a></li>
                            </ul>
                        </li>


                    </ul>
                </div>

            </div>


        </div>
    </div>

@stop