<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Category Update form</h2>
        <form action="{{ route('update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <div id="thumb-output"></div>
                <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" value="{{$user->image}}">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" aria-describedby="emailHelp" value="{{$user->status}}">
                    <option value="0">Active</option>
                    <option value="1">Deactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</body>
<script src="js/script.js"></script>
    
</html>
