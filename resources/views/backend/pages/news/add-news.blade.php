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
                            <h2><i class="fa fa-newspaper-o"></i> Add News</h2>
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
                                    <form action="{{route('add-news')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group form-group-sm">
                                            <label for="date"> Date</label>
                                            <input type="text" name="date" class="form-control"
                                                   value="{{date('Y-m-d')}}" id="date">
                                            <a href="" style="color: red;">{{$errors->first('date')}}</a>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="categories">Select Categories</label>
                                            <select class="form-control" name="cat_id" id="categories">
                                                @foreach ($newsCategoryData as $category)
                                                    <option value="{{$category->id}}">{{ucfirst($category->cat_name)}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" value="{{old('title')}}"
                                                   class="form-control">
                                            <a href="" style="color: red;">{{$errors->first('title')}}</a>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="slug">Slug</label>
                                            <input type="text"  name="slug" id="slug"
                                                   class="form-control">
                                            <a href="" style="color: red;">{{$errors->first('slug')}}</a>
                                        </div>


                                        <div class="form-group form-group-sm">
                                            <label for="">News Picture</label>
                                            <input type="file" name="upload" class="form-control">
                                            <a href="" style="color: red;">{{$errors->first('uploads')}}</a>

                                        </div>


                                        <div class="form-group form-group-sm">
                                            <label for="">News Status</label>
                                            <div class="form-group form-group-sm">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-primary btn-sm active">
                                                        <input type="radio" name="status" value="1" checked>
                                                        Publish
                                                    </label>
                                                    <label class="btn btn-primary btn-sm">
                                                        <input type="radio" name="status" value="0"> Draft
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="keywords">Keywords</label>
                                            <br>
                                            <input type="text" name="keywords" id="keywords" data-role="tagsinput"
                                                   value="Education,Sports,News,Result" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="summary">Summary</label>
                                            <br>
                                            <textarea name="summary" id="summary" style="resize: none;"
                                                      class="form-control"
                                                      rows="4"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="description_id">Details</label>
                                            <br>
                                            <textarea name="details" id="description"
                                                      class="form-control"></textarea>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <button type="submit" class="btn btn-success"><i
                                                        class="fa fa-newspaper-o"></i> Register News
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