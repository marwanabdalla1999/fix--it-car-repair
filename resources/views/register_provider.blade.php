<!DOCTYPE html>
    <head>

    </head>
    <body >
        <form method="post" action="{{ 'api/store-image' }}"
              enctype="multipart/form-data">
            @csrf
            <label><h4>name</h4></label>
            <input type="text" class="form-control" name='name' required />
            <br>
            <br>
            <br>
            <label><h4>username</h4></label>
            <input type="text" class="form-control" name='username' required />
            <br>
            <br>
            <br>
            <label><h4>password</h4></label>
            <input type="password" class="form-control" name='password' required />
            <br>
            <br>
            <br>
            <label><h4>specialized</h4></label>
            <input type="text" class="form-control" name='specibackendalized' required />
            <br>
            <br>
            <br>
            <label><h4>phone</h4></label>
            <input type="text" class="form-control" name='phone' required />
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
