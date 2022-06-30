@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-user"></i> Add Admin</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">

                                <form action="'api/store-image'" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group form-group-sm">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" placeholder="enter your name"
                                               class="form-control">
                                        <a href="" style="color: red;"></a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" placeholder="enter your email"
                                               class="form-control">
                                        <a href="" style="color: red;"></a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" placeholder="enter your phone+"
                                               class="form-control">
                                        <a href="" style="color: red;"></a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="pasword" placeholder="enter your password"
                                               class="form-control">
                                        <a href="" style="color: red;"></a>
                                    </div>


                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Admin</button>
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
