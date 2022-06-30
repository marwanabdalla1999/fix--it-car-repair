@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-plus"></i> Add Banner</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="{{route('add-banner')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group form-group-sm">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" placeholder="Title"
                                               value="{{old('title')}}" class="form-control">

                                        <a href="" style="color: red;">{{$errors->first('title')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug"  id="slug" class="form-control">

                                        <a href="" style="color: red;">{{$errors->first('slug')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="upload">Banner Image</label>
                                        <input type="file" name="image" class="btn btn-default btn-sm">
                                        <a href="" style="color: red;">{{$errors->first('image')}}</a>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label for="description"> Description</label>
                                        <textarea class="form-control" name="description" id="description"></textarea>

                                        <a href="" style="color: red;">{{$errors->first('description')}}</a>
                                    </div>


                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Banner
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

@endsection