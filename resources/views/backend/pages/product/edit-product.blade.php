@extends('backend.master.master')

@section('content')
    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Product</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="{{route('product-edit-action')}}" method="post"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <input type="hidden" name="criteria" value="{{$productData->id}}">
                                            <div class="form-group form-group-sm">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="{{$productData->name}}" id="name"
                                                       placeholder="enter your name"
                                                       class="form-control">
                                                <a href="" style="color: red;">{{$errors->first('name')}}</a>
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <label for="brand_name">Brand Name</label>
                                                <input type="text" name="brand_name" value="{{$productData->brand_name}}" id="brand_name"
                                                       placeholder="enter your brand name"
                                                       class="form-control">
                                                <a href="" style="color: red;">{{$errors->first('brand_name')}}</a>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <label for="brand_name">Price</label>
                                                <input type="text" name="price" value="{{$productData->price}}" id="brand_name"
                                                       placeholder="enter your price"
                                                       class="form-control">
                                                <a href="" style="color: red;">{{$errors->first('price')}}</a>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <label for="mg">MG</label>
                                                <input type="text" name="mg" value="{{$productData->mg}}" id="mg"
                                                       placeholder="enter your mg"
                                                       class="form-control">
                                                <a href="" style="color: red;">{{$errors->first('mg')}}</a>
                                            </div>


                                            <div class="form-group form-group-sm">
                                                <label for="image">Product Image</label>
                                                <input type="file" name="image" id="change_image" class="btn btn-default btn-sm">
                                                <a href="" style="color: red;">{{$errors->first('image')}}</a>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" name="description" id="description" rows="3" >
                                                    {{$productData->description}}
                                                </textarea>
                                                <a href="" style="color: red;">{{$errors->first('description')}}</a>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <label for="myDatepicker2">Manufacturer Date</label>
                                                <input type="text" name="man_date" value="{{$productData->man_date}}" id="myDatepicker2"

                                                       class="form-control">
                                                <a href="" style="color: red;">{{$errors->first('man_date')}}</a>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <label for="myDatepicker3">Expiry Date</label>
                                                <input type="text" name="exp_date" value="{{$productData->exp_date}}" id="myDatepicker3"

                                                       class="form-control">
                                                <a href="" style="color: red;">{{$errors->first('exp_date')}}</a>
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit"></i> Update Info
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{url('public/backend/uploads/images/product/'.$productData->image)}}"
                                             id="target_image" alt="image not found" class="img-responsive thumbnail">
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