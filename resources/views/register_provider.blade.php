<!DOCTYPE html>
    <head>

    </head>
    <body >
        <form method="post" action="{{ 'api/store-image' }}"
              enctype="multipart/form-data">
            @csrf
                <label><h4>Add image</h4></label>
                <input type="file" class="form-control" name='photo' required />

                <input type="submit" value="add" class="btn btn-success"/>

        </form>
    </body>
</html>
