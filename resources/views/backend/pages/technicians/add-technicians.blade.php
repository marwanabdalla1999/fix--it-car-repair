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

                                <form action="" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group form-group-sm">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" placeholder="enter your name"
                                               class="form-control">
                                        <a href="" style="color: red;"></a>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" placeholder="enter your username"
                                               class="form-control">
                                        <a href="" style="color: red;"></a>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" placeholder="enter your phone"
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
                                        <label for="specialized_at">Specialized at</label>
                                        <fieldset>
                                        <input type="checkbox" name="specialized_at" value="can't detect issue" id="cb1"
                                               > <label for="cb1" style="color: #0f0f0f">Can't detect issue</label><br>
                                        <input type="checkbox" name="specialized_at" value="change or charge battery" id="cb2"
                                               > <label for="cb2" style="color: #0f0f0f">Change or charge battery</label><br>
                                        <input type="checkbox" name="specialized_at" value="tire" id="cb3"
                                               > <label for="cb3" style="color: #0f0f0f">Tire</label><br>
                                        <input type="checkbox" name="specialized_at" value="motor" id="cb4"
                                               > <label for="cb4" style="color: #0f0f0f">Motor</label><br>
                                        <input type="checkbox" name="specialized_at" value="change oil" id="cb5"
                                               > <label for="cb5" style="color: #0f0f0f">Change oil</label><br>
                                        <input type="checkbox" name="specialized_at" value="fuel" id="cb6"
                                               > <label for="cb6" style="color: #0f0f0f">Fuel</label>
                                        </fieldset>

                                        <a href="" style="color: red;"></a>
                                    </div>


                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Technician</button>
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
