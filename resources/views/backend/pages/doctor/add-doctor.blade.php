@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Doctor</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="{{route('add-doctor')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group form-group-sm">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" placeholder="enter your name"
                                               class="form-control">
                                        <a href="" style="color: red;">{{$errors->first('name')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" placeholder="enter your email"
                                               class="form-control">
                                        <a href="" style="color: red;">{{$errors->first('email')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="pasword" placeholder="enter your password"
                                               class="form-control">
                                        <a href="" style="color: red;">{{$errors->first('password')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="password_confirmation">Password Confirm</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                               placeholder="enter your password confirm "
                                               class="form-control">
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="upload">Profile Picture</label>
                                        <input type="file" name="upload" class="btn btn-default btn-sm">
                                        <a href="" style="color: red;">{{$errors->first('upload')}}</a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success btn-sm"> Add Doctor</button>
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