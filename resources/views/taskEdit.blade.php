<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Edit</h2>


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif




        <form method="post" action="{{ url('tasks/'.$data['id']) }}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="_method" value="put">

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" value="{{ $data['title'] }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Content</label>
                <input type="text" name="content" value="{{ $data['content'] }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter content">
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

</body>

</html>