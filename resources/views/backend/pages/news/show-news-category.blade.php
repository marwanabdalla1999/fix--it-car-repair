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
                            <h2><i class="fa fa-folder"></i> Manage Category</h2>
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
                                    <form action="{{route('show-news-category')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group form-group-sm">
                                            <label for="name">Category Name</label>
                                            <input type="text" name="cat_name" class="form-control" id="name"
                                                   placeholder="Enter Category Name">
                                            <a href="" style="color: red;">{{$errors->first('cat_name')}}</a>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-plus"></i> Add Category
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($newsCategoryData as $key=>$cat)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{ucfirst($cat->cat_name)}}</td>
                                            <td>
                                                <form action="{{route('update-news-category-status')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="criteria" value="{{$cat->id}}">
                                                    @if($cat->status==1)
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
                                            <td>
                                                {{$cat->created_at->diffForHumans()}}

                                            </td>
                                            <th>
                                                <a href="{{route('edit-news-category').'/'.$cat->id}}" class="btn btn-success btn-xs">Edit</a>
                                                <a href="{{route('delete-news-category').'/'.$cat->id}}" onclick="return confirm('Are you sure delete?')" class="btn btn-danger btn-xs">Delete</a>
                                            </th>
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

    <!-- /page content end -->

@stop
