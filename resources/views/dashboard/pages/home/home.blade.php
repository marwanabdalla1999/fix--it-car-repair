@extends('dashboard.master.master')
@section('content')
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="container app">
                                                            <div class="row app-one">
                                                                <div class="col-sm-4 side">
                                                                    <div class="side-one">
                                                                        <div class="row heading">
                                                                            <div class="col-sm-3 col-xs-3 heading-avatar">
                                                                                <div class="heading-avatar-icon">
                                                                                    <img src="{{url('public/backend/uploads/images/doctor/'.Auth::guard('doctor')->user()->image)}}">
                                                                                    <a href="">{{Auth::guard('doctor')->user()->name}}</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-1 col-xs-1  heading-dot  pull-right">
                                                                                <i class="fa fa-ellipsis-v fa-2x  pull-right"
                                                                                   aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
                                                                                <i class="fa fa-comments fa-2x  pull-right"
                                                                                   aria-hidden="true"></i>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row searchBox">
                                                                            <div class="col-sm-12 searchBox-inner">
                                                                                <div class="form-group has-feedback">
                                                                                    <input id="searchText" type="text"
                                                                                           class="form-control"
                                                                                           name="searchText"
                                                                                           placeholder="Search">
                                                                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row sideBar">
                                                                            @foreach($userData as $doctor)
                                                                                <a href="javascript:void(0)"
                                                                                   id="receiver_username"
                                                                                   class="receiver_username"
                                                                                   data-id="{{$doctor->username}}">
                                                                                    <div class="row sideBar-body">

                                                                                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                                                                            <div class="avatar-icon">
                                                                                                <img src="{{url('public/backend/uploads/images/user/'.$doctor->image)}}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-9 col-xs-9 sideBar-main">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-8 col-xs-8 sideBar-name">
                                            <span class="name-meta">{{$doctor->username}}
                                             </span>
                                                                                                </div>
                                                                                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                                             <span class="time-meta pull-right">18:18
                                             </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            @endforeach

                                                                        </div>
                                                                    </div>

                                                                    <div class="side-two">
                                                                        <div class="row newMessage-heading">
                                                                            <div class="row newMessage-main">
                                                                                <div class="col-sm-2 col-xs-2 newMessage-back">
                                                                                    <i class="fa fa-arrow-left"
                                                                                       aria-hidden="true"></i>
                                                                                </div>
                                                                                <div class="col-sm-10 col-xs-10 newMessage-title">
                                                                                    New Chat
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row composeBox">
                                                                            <div class="col-sm-12 composeBox-inner">
                                                                                <div class="form-group has-feedback">
                                                                                    <input id="composeText" type="text"
                                                                                           class="form-control"
                                                                                           name="searchText"
                                                                                           placeholder="Search People">
                                                                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row compose-sideBar">
                                                                            <div class="row sideBar-body">
                                                                                <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-9 col-xs-9 sideBar-main">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                                                                        </div>
                                                                                        <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-8 conversation"
                                                                     style="display:none;">
                                                                    <div class="row heading">
                                                                        <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
                                                                            <div class="heading-avatar-icon">
                                                                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png">

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-8 col-xs-7 heading-name">
                                                                            <div id="doctor-name"></div>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1  heading-dot pull-right">
                                                                            <i class="fa fa-ellipsis-v fa-2x  pull-right"
                                                                               aria-hidden="true"></i>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row message" id="conversation">


                                                                    </div>

                                                                    <div class="row reply">
                                                                        <div class="col-sm-1 col-xs-1 reply-emojis">
                                                                            <i class="fa fa-smile-o fa-2x"></i>
                                                                        </div>
                                                                        <div class="col-sm-9 col-xs-9 reply-main">

                                                                            <form action="{{route('doctor-send-message')}}"
                                                                                  id="send_message_cline_all"
                                                                                  method="post">
                                                                                {{csrf_field()}}
                                                                                <input type="hidden"
                                                                                       id="receiver_username">
                                                                                <textarea name="message"
                                                                                          class="form-control col-lg-4"
                                                                                          id="message_box"></textarea>

                                                                            </form>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 reply-recording">
                                                                            <i class="fa fa-microphone fa-2x"
                                                                               aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 reply-send">
                                                                            <i class="fa fa-send fa-2x"
                                                                               aria-hidden="true"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection