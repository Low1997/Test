<?php
require 'database.php';

if(!empty($_SESSION["id"])){
  header("location:index.php");
}


if (isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $result= mysqli_query($conn,"Select * FROM userlist WHERE email='$email'");
    $row= mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){

        if($password == $row["password"]){
          $_SESSION["login"] = true;
          $_SESSION["id"]= $row["id"];
          header("location:index.php");
        }

        else{
          echo '<script> alert("Wrong Password") </script>';
  
        }
    }

    else{
          echo '<script> alert("User Not Registered") </script>';
    }
                
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Web Lab Feedback Form</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-With-Button-icons.css">
<style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: url('https://wallpaperaccess.com/full/1947484.jpg');
    }


    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.7) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
</style>
</head>

<body class="background-radial-gradient overflow-hidden">

 <!-- Section: Design Block -->
<section >

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Web Programming Lab <br />
          <span style="color: hsl(218, 81%, 75%)">Feedback Form</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          This is the website template created by Low Han Cheng to teach Web Programming Lab for Cognitive Sciences students.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">

            <form method="POST">
            <div style="text-align: center;"><h2>Log in</h2></div>
              
              <!-- Email input -->
              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Email address: </label>
              <input type="email" id="form3Example3" class="form-control" name="email"/>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Password: </label>
                <input type="password" id="form3Example4" class="form-control" name="password" minlength="5"/>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4" name="login">
               Log In
              </button>

              <!-- Login Link -->
              <div class="form-outline mb-4" style="text-align: right;">
              <a href="Register.php">Register</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>

</html>