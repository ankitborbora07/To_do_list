<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <style>
         body{
          background: url("https://cdn1.vectorstock.com/i/1000x1000/13/40/todo-list-seamless-pattern-universal-background-vector-7561340.jpg");
          background-repeat: no-repeat;
          background-size: cover;
    }
        
        /* .black-line {
  border: none; 
  border-top: 1px solid black; 
  margin-top: 5px;
} */
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
            <div class="h2">Create a task</div>
            <hr class="black-line">
            
            <a href="dashboard" class="btn btn-primary btn-lg">All tasks</a>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="create" method="post" enctype="multipart/form-data" class="custom-form">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                @if(session()->has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    @csrf
                    <div>
                    <label for="" class="form-label mt-4"><b>Name of the task:</b></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter the name of the task" value="{{old('name')}}">
                    <span class="text-danger">@error('name') {{$message}} @enderror </span>
                    </div>

                    <div>
                    <label for="" class="form-label mt-4"><b>Description of the task:</b></label>
                    <textarea type="text" name="text" class="form-control" placeholder="Enter the text" value="{{old('text')}}" rows="4" cols="80">{{ old('text') }}</textarea>
                    <span class="text-danger">@error('text') {{$message}} @enderror </span>
                    </div>

                    <div>
                    <label for="" class="form-label mt-4"><b>Image:</b></label>
                    <input type="file" name="image" class="form-control" placeholder="Enter image"  value="{{old('image')}}">
                    <span class="text-danger">@error('image') {{$message}} @enderror </span>
                    </div>

                    <div>
                    <label for="" class="form-label mt-4"><b>Date:</b></label>
                    <input type="date" name="date" class="form-control"  value="{{old('date')}}">
                    <span class="text-danger">@error('date') {{$message}} @enderror </span>
                    </div>

                    <div>
                    <label for="" class="form-label mt-4"><b>Time:</b></label>
                    <input type="time" name="time" class="form-control"  value="{{old('time')}}">
                    <span class="text-danger">@error('time') {{$message}} @enderror </span>
                    </div>

                    <button class="btn btn-success btn-lg mt-4">Add Task</button>
                </form>
            </div>
        </div>

       
    </div>
    
</body>
</html>