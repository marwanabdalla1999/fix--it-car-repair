@extends('backend.master.master')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Show Notice</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('backend.layouts.messages')
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>File</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($noticeData as $key=>$notice)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{substr($notice->title,0,50)}}</td>
                                                <td>

                                                    <form action="{{route('update-notice-status')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="criteria" value="{{$notice->id}}">
                                                        @if($notice->status==1)
                                                            <button name="active" class="btn btn-success btn-xs ">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        @else
                                                            <button name="inactive" class="btn btn-danger btn-xs ">
                                                                <i class="fa fa-times"></i>
                                                            </button>

                                                        @endif
                                                    </form>

                                                </td>
                                                <td>{{$notice->date}}</td>
                                                <td>
                                                    <img src="{{url('public/backend/uploads/images/notice/',$notice->image)}}"
                                                         alt="" width="40"></td>

                                                <td>
                                                    <a href="{{route('edit-notice').'/'.$notice->id}}"
                                                       class="btn btn-success btn-xs"><i class="fa fa-edit"></i> </a>
                                                    <a href="{{route('delete-notice').'/'.$notice->id}}"
                                                       onclick="return confirm('Are you sure..')"
                                                       class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                                                    </a>
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
        </div>
    </div>

@stop

