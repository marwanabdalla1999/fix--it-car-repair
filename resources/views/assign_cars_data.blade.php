<!DOCTYPE html>
    <head>

    </head>
    <body >
        <form method="get" action="{{ 'api/car_data' }}"
              enctype="multipart/form-data">
            @csrf
            <label><h4>Type</h4></label>
            <input type="text" class="form-control" name='type' required />
            <br>
            <br>
            <br>
            <label><h4>brand</h4></label>
            <input type="text" class="form-control" name='brand' required />
            <br>
            <br>
            <br>
            <label><h4>model</h4></label>
            <input type="text" class="form-control" name='model' required />
            <input type="file" class="form-control" name='photo' required />
            <br>
            <br>
            <br>
            <label><h4>Add image</h4></label>
            <input type="file" class="form-control" name='photo' required />
            <br>
            <br>
            <br>
                <input type="submit" value="add" class="btn btn-success"/>

        </form>
    </body>
</html>
