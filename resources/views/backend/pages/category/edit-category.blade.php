@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Category</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="{{route('category-edit-action')}}" method="post"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <input type="hidden" name="criteria" value="{{$categoryData->id}}">
                                            <div class="form-group form-group-sm">
                                                <label for="name">Name</label>
                                                <input type="text" name="cat_name" value="{{$categoryData->cat_name}}" id="cat_nam"
                                                       placeholder="enter your category name"
                                                       class="form-control">
                                                <a href="" style="color: red;">{{$errors->first('cat_name')}}</a>
                                            </div>


                                            <div class="form-group form-group-sm">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit"></i> Update Info
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
    </div>

@endsection