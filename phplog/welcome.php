<?php 

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true)
{
    header("location:login.php");
}

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>PHP-REGISTRATION</title>
<!--     <link rel="stylesheet" href="style.css"> -->
    <link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

  </head>
  <body >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">PHP-REGISTRATION-SYSTEM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php" style="color:aqua">Home <span class="sr-only">(current)</span></a>
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
     
      <li class="nav-item active">
        <a class="nav-link" href="logout.php" style="color:aqua">Logout</a>
      </li>
    </ul>
     <div class="navbar-collapse collapse">
       <ul class="navbar-nav ml-auto">
       <li class="nav-item active">
       
        <a class="nav-link" href="welcome.php" style="color:lightgreen"><img src="bird.jfif" width="30px" height="30px"  style="border-radius:50%">&nbsp;<?php echo "Welcome ".$_SESSION['username']?></a>
      </li>
       </ul>
     </div>


  </div>
</nav>
<div class="container mt-4" style="font-family:Charcol">
<h1 align="center" ><b>LOGGED-IN</b></h1><hr>


        <div id="container">
           <div class="page_content">
              if you have food then don't waste send it here....
    </div>
    <div class="comment_input">
        <form name="form1" >
           <div class="form-group col-md-11">
          <input type="text" name="name" placeholder="Name..." class="form-control"/>   
            </div>
              <div class="form-group col-md-11">
            <input type="email" name="email" placeholder="Email....." class="form-control" />
          </div>
          <div class="form-group col-md-11">
            <input type="number" name="num" placeholder="Your contact number....." class="form-control" />
          </div>
          <div class="form-group col-md-11">
           <input type="text" name="comments" placeholder="Leave Food details Here....." class="form-control" />
          </div>
              <div class="form-group col-md-11">
            <textarea type="text" name="address" placeholder="Enter your full Address With pin no. " class="form-control" ></textarea>
          </div>
          <div class="form-group col-md-11">
            <button  name="location" class="btn btn-info" value="add your location" >add your location</button> 
          </div>
            <a href="#" onClick="commentSubmit()" class="button btn btn-success" >Post</a>  &nbsp; &nbsp;  &nbsp;  &nbsp;
            <input type="reset" value="reset">

        </form>
    </div>
    <div id="comment_logs">
      Loading comments...
    <div>
</div>




</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
  function commentSubmit(){
    if(form1.name.value == '' || form1.comments.value == ''  ){ //exit if one of the field is blank
      alert('Enter your complete details !');
      return;
    }
    if(form1.email.value == '' || form1.num.value == ''){ //exit if one of the field is blank
      alert('Enter your complete details !');
      return;
     }
     if(form1.address.value == ''){ //exit if one of the field is blank
        alert('Enter your complete details !');
          return;
    }
    var name = form1.name.value;
    var comments = form1.comments.value;
    var email = form1.email.value;
    var num = form1.num.value;
    var address = form1.address.value;
    var xmlhttp = new XMLHttpRequest(); //http request instance
    
    xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
      if(xmlhttp.readyState==4&&xmlhttp.status==200){
        document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
      }
    }
    xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments+'&email='+email+'&num='+num+'&address='+address, true); //open and send http request
    xmlhttp.send();
  }
  
    $(document).ready(function(e) {
      $.ajaxSetup({cache:false});
      setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
    });
    
</script>

  </body>
</html>