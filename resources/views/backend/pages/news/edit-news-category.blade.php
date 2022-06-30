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
                            <h2><i class="fa fa-edit"></i> Updated Category</h2>
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

                                    <form action="{{route('edit-news-category-action')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="criteria" value="{{$categoryData->id}}">
                                        <div class="form-group form-group-sm">
                                            <label for="name">Category Name</label>
                                            <input type="text" value="{{$categoryData->cat_name}}" name="cat_name"
                                                   class="form-control"  id="name"
                                                   placeholder="Enter Category Name">
                                            <a href="" style="color: red;">{{$errors->first('cat_name')}}</a>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-plus"></i> Update Category
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