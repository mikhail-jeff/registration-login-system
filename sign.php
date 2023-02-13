<?php

$success=0;
$user=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  include 'connect.php';
  
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];

  $sql = "SELECT * FROM `registration` WHERE username='$username'";

  $result = mysqli_query($conn, $sql);

  if($result){
    $num=mysqli_num_rows($result);

    if($num > 0 ){
      $user = 1;
    }else{
      if($password === $cpassword){
        $sql = "INSERT INTO `registration` (`username`, `password`) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);
          if($result){
          $success=1;
          header('location: login.php');
        }
      }else{
        $invalid=1;
      }
    }
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

  <?php 
    if($user){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Sorry!</strong> User already exists!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
  ?>

  
  <?php 
    if($success){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You are signed up!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
  ?>

  <?php 
    if($invalid){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Sorry!</strong> Password did not match!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
  ?>


    <h3 class="text-center mt-3 mt-5">Sign-up</h3>
    <div class="container mt-5 w-25 card p-5 shadow-lg rounded">
      <form action="sign.php" method="POST">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name:</label>
          <input type="text" class="form-control" placeholder="Enter your username" name="username" required>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password:</label>
          <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Confirm Password:</label>
          <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Sign-up</button>
      </form>
      <p class="mt-2">Already have an account? <a href="login.php">Login here.</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>