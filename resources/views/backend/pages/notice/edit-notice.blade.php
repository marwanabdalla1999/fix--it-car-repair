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
                            <h2><i class="fa fa-newspaper-o"></i> Update Notice</h2>
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

                                    <form action="{{route('edit-notice-action')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="criteria" value="{{$noticeData->id}}">

                                        <div class="form-group form-group-sm">
                                            <label for="date">Notice Date</label>
                                            <input type="text" name="date" class="form-control"
                                                   value="{{$noticeData->date}}" id="date">
                                            <a href="" style="color: red;">{{$errors->first('date')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" value="{{$noticeData->title}}"
                                                   class="form-control">
                                            <a href="" style="color: red;">{{$errors->first('title')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="slug">Slug</label>
                                            <input type="text" readonly name="slug" id="slug"
                                                   value="{{$noticeData->slug}}" class="form-control">
                                            <a href="" style="color: red;">{{$errors->first('slug')}}</a>
                                        </div>


                                        <div class="form-group form-group-sm">
                                            <label for="">File </label>
                                            <input type="file" name="file" class="form-control">

                                        </div>

                                        <div class="form-group">
                                            <label for="description_id">Details</label>
                                            <a href="" style="color: red;">{{$errors->first('description')}}</a>
                                            <textarea name="description" id="description_id"
                                                      class="form-control">
                                                    {{$noticeData->description}}
                                                </textarea>

                                        </div>

                                        <div class="form-group form-group-sm">
                                            <button type="submit" class="btn btn-success"><i
                                                        class="fa fa-edit"></i> Update Notice
                                            </button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop