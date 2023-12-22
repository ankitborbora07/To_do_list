<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Welcomepage.css">
    <title>Login</title>
</head>
<body>
   
<div class="body">
    <div class="container">
        <h1 class="h1" style="font-family: cursive;">To Do List App</h1>
        <div class="modal">
            <div class="modal-container">
                <div class="modal-left">
                   
                   
                    <!-- <form action="login" method="post">
                    @if(Session::has('success'))
                      <div style="color:red;">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                      <div style="color:red;">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                        <div id="shift">
                         </div>
                        <div class="one" >
                            <div style="width:100%; " >
                               
                               
                            </div>

                            
                           
                        </div>
                       
                    </form> -->
        

                    <div  id="shift1">
  
                        <div id="login">
                        <h2 style="text-align:center">Login with Social Media</h2>
                      
                            <a href="{{route('google-auth')}}" class="google btn">
                              <i class="fa fa-google fa-fw"></i> &nbsp; Login with Google
                            </a>
                            <a href="{{route('facebook-auth')}}" class="fb btn">
                              <i class="fa fa-facebook fa-fw"></i>  &nbsp; Login with Facebook
                            </a>
                            
                          </div>
                          <div class="bottom-container">
                              <div class="row">
    
                            <p  style="color:white" class="btn">Click on one of the above buttons to log in</a>
   
                        </div>
                       </div>
                        
                    </div>
                  
                </div>
                <!-- {{-- <div class="modal-right"> --}}
                    {{-- <img
                        src="https://images.unsplash.com/photo-1512486130939-2c4f79935e4f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=dfd2ec5a01006fd8c4d7592a381d3776&auto=format&fit=crop&w=1000&q=80"
                        alt=""
                    />
                </div> --}} -->
            </div>
        </div>
    </div>
               
</div>
</body>
</html>