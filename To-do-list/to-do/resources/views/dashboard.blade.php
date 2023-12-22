<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <style>
        a{
            text-decoration:none;
        }
        body{
          background: url("https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA1L3JtMjctc2FzaS0xNC1zdW1tZXIuanBn.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
        }
         table {
  border-collapse: collapse;
  width: 100%;
  font-family: 'Verdana', sans-serif !important;
  font-style: italic; 
  /* background-color: #3c3f42; */
}
td {
  border: 1px solid #dddddd;
  padding: 8px;
  text-align: center;
}


/* tr:nth-child(even) {
  background-color: #f9f9f9;
} */


#del {
  margin-right:10px;
  padding: 6px 10px;
  background-color: #ff6347;
  color: white;
  border: none;
  cursor: pointer;
}
form {
  /* text-align: center; */
  margin-bottom: 20px;
}

/* Style for input fields */
input[type="text"] {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-right: 5px;
  width: 200px;
}

/* Style for submit buttons */
button[type="submit"] {
  padding: 8px 16px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* Style for submit button on hover */
button[type="submit"]:hover {
  background-color: #45a049;
}


.digital-clock {
    font-size: 3em;
    color: #333;
}

.w-5{
  display:none;
}
.custom-rounded-table {
    border-radius: 30px; 
    overflow: hidden;
}

    
</style>
    
</head>
<body>
    <div class="bg-dark">
        <div class="container py-3 d-flex justify-content-between align-items-center ">
        <div class="h1 text-white" style="font-family: cursive;"> <i class="fa-solid fa-list"></i> Todo List App</div>
        <a href="/logout"><button type="button" class="btn btn-outline-info"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</button></a>
    </div>
    </div>

    <div class="container">
    <div class="d-flex justify-content-between align-items-center my-5">
        <div class="h1 animate__animated animate__lightSpeedInLeft">Hello, {{$user['name']}}. Following up your tasks.</div>
         <div class="todays-date">
         <h1>Date: {{ \Carbon\Carbon::now()->format('d/m/y') }}</h1>
         </div>
    </div>
        <div class="d-flex justify-content-between align-items-center my-5">
            <div class="h1">All tasks:</div>
           
            <b><div class="digital-clock" id="digitalClock"></div></b>
            <div>
            <a href="/today"><button id="today" type="button" class="btn btn-success btn-lg">Todays's tasks</button></a>
            <a href="/create" class="btn btn-primary btn-lg">Add task</a>
            <a href="/pending"><button id="today" type="button" class="btn btn-dark btn-lg">Pending tasks</button></a>
            </div>
        </div>
        @if(isset($noTasks) && $noTasks)
        <div style="display: flex; justify-content: center; ">
        <h1 class="animate__animated animate__lightSpeedInLeft">There are no tasks for this user.</h1>
        </div>
        @endif

        @if(isset($noTasks) && !$noTasks)
        <table class="table table-striped table-dark custom-rounded-table animate__animated animate__zoomIn">
            <tr>
                <th style="text-align:center; width:120px">Name</th>
                <th style="text-align:center;">Description</th>
                <th style="text-align:center;">Image</th>
                <th style="text-align:center;">Date</th>
                <th style="text-align:center;">Time</th>
                <th style="text-align:center;">Status</th>
                <th style="text-align:center;">Action</th>
            </tr>
            <tbody>
            @foreach($collection as $item)
            <tr data-row-id="{{ $item['id'] }}" valign="center">
            <td style="vertical-align: middle;">{{$item['name']}}</td>
            <td style="vertical-align: middle;width:650px">{{$item['text']}}</td>
            <td><img class="abc" style="vertical-align: middle;width:auto;height:160px;" src="{{asset('storage/'.$item['image'])}}"></td>
            <td style="vertical-align: middle;width:150px">{{$item['date']}}</td>
            <td style="vertical-align: middle;width:120px">{{$item['time']}}</td>
            <td style="vertical-align: middle;width:120px">{{$item['status']}}</td>
            <td style="vertical-align: middle;width:120px">
            <button id="del" class="btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            @if (!in_array($item['status'], ['Completed', 'Expired', 'Mail Sent']))
            <a href="{{"edit/".$item['id']}}"><button id="upd" class="btn-primary btn-sm"><i class="fa-solid fa-pen"></i></button></a>
            @endif
          </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
        <div style="display:inline-block; margin:auto;">
             {{$collection->links()}} 
        </div>
    </div>
    <script>
        function updateDigitalClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            const digitalClockElement = document.getElementById('digitalClock');
            digitalClockElement.textContent = `${hours}:${minutes}`;
        }

        setInterval(updateDigitalClock, 1000);
        updateDigitalClock();
    </script>

    <script>
          $(document).ready(function() {
            $(document).on('click', '#del', function() {
               
                 $button = $(this);
                 console.log($button);
               
                var rowId = $button.closest("tr").data("row-id");
                 console.log(rowId);

               
                jQuery.ajax({
                    url: '/del/'+rowId, 
                    method: "GET",
                    
                    
                    success: function(response) {
                     console.log(response);
                        
                        if (response.code == 200) {
                            
                            $button.closest("tr").remove();
                        }
                    },
                    error: function(error) {
                        console.log("Error:", error);
                    }
                });
            });
            
          });
    </script>
</body>
</html>