<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <style>
        .container{
            width:30%;
            margin-top: 9%;
            box-shadow: 0px 3px 20px rgba(0,0,0,0.3);
            padding:40px;
        }
    </style>
  </head>
  <body>
    <div class="container ">
      
      <h1 class="text-center">LOGIN</h1>
      <div style="padding-top:30px" class="pannel-body">
       
            
            
            
          </div>
          
          <form method = "post">

      <div class="col mb-4">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3" name="email" value="">
        </div>
      </div>
      <div class="col mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" name="password">
        </div>
      </div>
      <div class="row mb-3">
        <div class="row-sm-10 offset-sm-1">
          <div class="checkbox">
            <label class="form-check-label" for="gridCheck1" >
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="ingataku" value="1" >
              Remember Me?
            </label>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="login" value="login">Login</button>
    </div>
    
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>