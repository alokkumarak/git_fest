<?php
require_once "config.php";

$username=$password=$confirm_password="";
$username_err=$password_err=$confirm_password_err="";

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty(trim($_POST['username']))){
        $username_err="Username can't be blank";
    }
    else{
        $sql="SELECT id FROM users WHERE username =?";
        $stmt=mysqli_prepare($conn,$sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt,"s",$param_username);
            $param_username=trim($_POST['username']);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1){
                    $username_err="This Username is already Taken";

                }
                else{
                    $username=trim($_POST['username']);
                }
            }
            echo "Something went worng";
        }
    }

       mysqli_stmt_close($stmt);



if(empty(trim($_POST['password']))){
    $password_err="password connot be blank!";
}
elseif(strlen(trim($_POST['password']))< 6){
    $password_err="Password cannot be less than 5 characters";
}
else{
    $password=trim($_POST['password']);
}


if(trim($_POST['password']) != trim($_POST['confirm_password'])){
    $password_err="password should match!!!";
}


if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
     $sql="INSERT INTO users (username, password) VALUES (?,?)";
     $stmt=mysqli_prepare($conn,$sql);

     if($stmt){
         mysqli_stmt_bind_param($stmt, "ss" ,$param_username,$param_password);

         $param_username=$username;
         $param_password=password_hash($password,PASSWORD_DEFAULT);

         if(mysqli_stmt_execute($stmt)){
             header("location: login.php");
         }
         else{
             echo "somethings wents wrong .....cannot redirect";
         }
     }
    mysqli_stmt_close($stmt);

}
mysqli_close($conn);

}

?>



<!doctype html>
<html lang="en" >
  <head >
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <title>PHP-REGISTRATION</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <a class="navbar-brand" href="#">PHP-REGISTRATION-SYSTEM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php" style="color:aqua">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php" style="color:aqua">Login-Here</a>
      </li>
      
   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" 
        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:aqua">
          skills
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#" style="color:blueviolet">web-dev</a>
          <a class="dropdown-item" href="#" style="color:blueviolet">Languages</a>
          <a class="dropdown-item" href="#" style="color:blueviolet">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4 p-4" style="background: linear-gradient(to top, transparant, transparent); 
box-shadow: 5px 5px 15px rgb(177, 62, 192);" data-aos="zoom-in" data-aos-duration="1500" >
<h2 align="center" style="font-family:Charcol"  >REGISTER-HERE</h2><hr>

<form action="" method="post" >
  <div class="form-row ">
    <div class="form-group col-md-6">
      <label for="inputEmail4"><b>USERNAME :</b></label>
      <input type="text" class="form-control" name="username"id="inputEmail4" placeholder="Enter Username.......">
    </div>
    <div class="form-group col-md-6" >
      <label for="inputPassword4"><b>PASSWORD :</b></label>
      <input type="password" class="form-control" name="password" id="inputPassword4"  placeholder="Enter Password.......">
    </div>
  
  <div class="form-group col-md-6">
      <label for="inputPassword4"><b>CONFIRM PASSWORD :<b></label>
      <input type="password" class="form-control" name="confirm_password" id="inputPassword"  placeholder="Confirm Password.......">
    </div>
    </div>
 
  <div class="form-row ">
    <div class="form-group col-md-6" >
      <label for="inputCity"><b>City</b></label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState"><b>State</b></label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip"><b>Zip</b></label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-danger">Sign in</button>
</form>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
  </body>
</html>