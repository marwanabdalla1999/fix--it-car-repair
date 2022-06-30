@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Brand</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="{{route('add-brand')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-group form-group-sm">
                                        <label for="upload">Brand Image</label>
                                        <input type="file" name="img" class="btn btn-default btn-sm">
                                        <a href="" style="color: red;">{{$errors->first('img')}}</a>
                                    </div>


                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success btn-sm"> Add Brand</button>
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