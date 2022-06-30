@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Product</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-group form-group-sm">
                                        <label for="cat">Select Category</label>
                                        <select name="cat_id" id="cat" class="form-control">
                                            <option disabled selected>--select category---</option>
                                            @foreach($categoryData as $cat)
                                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                            @endforeach
                                        </select>
                                        <a href="" style="color: red;">{{$errors->first('cat_id')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" placeholder="enter your name"
                                               class="form-control">
                                        <a href="" style="color: red;">{{$errors->first('name')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" name="brand_name" id="brand_name"
                                               placeholder="enter your brand name"
                                               class="form-control">
                                        <a href="" style="color: red;">{{$errors->first('brand_name')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" placeholder="enter the price"
                                               class="form-control">
                                        <a href="" style="color: red;">{{$errors->first('price')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="mg">MG</label>
                                        <input type="text" name="mg" id="mg" placeholder="enter the mg of medicine"
                                               class="form-control">
                                        <a href="" style="color: red;">{{$errors->first('mg')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="upload">Product Image</label>
                                        <input type="file" name="image" class="btn btn-default btn-sm">
                                        <a href="" style="color: red;">{{$errors->first('image')}}</a>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" rows="3" ></textarea>
                                        <a href="" style="color: red;">{{$errors->first('description')}}</a>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label for="myDatepicker2">Manufacturer Date</label>
                                        <input type="text" name="man_date" class="form-control" id="myDatepicker2"
                                            value="{{date('Y-m-d')}}">
                                        <a href="" style="color: red;">{{$errors->first('man_date')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="myDatepicker3">Expiry  Date</label>
                                        <input type="text" name="exp_date" class="form-control" id="myDatepicker3"
                                               value="{{date('Y-m-d')}}">
                                        <a href="" style="color: red;">{{$errors->first('exp_date')}}</a>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success btn-sm"> Add Product</button>
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