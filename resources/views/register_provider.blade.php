<!DOCTYPE html>
    <head>

    </head>
    <body >
        <form method="post" action="{{ 'api/store-image' }}"
              enctype="multipart/form-data">
            @csrf
                <label><h4>Add image</h4></label>
                <input type="file" class="form-control" required name="photo">

                <button type="submit" class="btn btn-success">Add</button>

        </form>
    </body>
</html>
