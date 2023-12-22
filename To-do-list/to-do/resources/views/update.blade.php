<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update a task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
          background: url("https://cdn4.vectorstock.com/i/1000x1000/14/48/seamless-school-background-layered-vector-10531448.jpg");
          background-repeat: no-repeat;
          background-size: cover;
    }
    </style>
</head>
<body>
    <div class="bg-dark">
        <div class="container py-3">
        <div class="h1 text-white" style="font-family: cursive;"><i class="fa-solid fa-list"></i> Todo List App</div>
    </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-5">
            <div class="h2 text-white">Update Task</div>
            <a href="/dash" class="btn btn-primary btn-lg">All tasks</a>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="/update" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" class="form-control" value="{{$collection['id']}}">


                    <label for="" class="form-label mt-4"><b>Name of the task:</b></label>
                    <input type="text" name="name" class="form-control" value="{{$collection['name']}}">

                    <label for="" class="form-label mt-4"><b>Description of the task:</b></label>
                    <textarea type="text" class="form-control" placeholder="Enter the text" name="text"  rows="4" cols="80">{{$collection['text']}}</textarea>

                    <label for="" class="form-label mt-4"><b>Image:</b></label>
                    <input type="file" class="form-control" placeholder="Enter image" name="image" value="{{$collection['image']}}">

                    <label for="" class="form-label mt-4"><b>Date:</b></label>
                    <input type="date" name="date" class="form-control" value="{{$collection['date']}}">

                    <label for="" class="form-label mt-4"><b>Time:</b></label>
                    <input type="time" name="time" class="form-control" value="{{$collection['time']}}">

                    <button class="btn btn-dark btn-lg mt-4">Update Task</button>
                </form>
            </div>
        </div>

       
    </div>
    
</body>
</html>