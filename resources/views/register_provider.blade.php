<!DOCTYPE html>
    <head>

    </head>
    <body >
        <form method="post" action="{{ 'api/store-image' }}"
              enctype="multipart/form-data">
            @csrf
                <label><h4>Add image</h4></label>
                <input type="image" class="form-control" name='photo' required >

                <button type="submit" class="btn btn-success">Add</button>

        </form>
    </body>
</html>
