<?php 

  session_start();
  if(!isset($_SESSION['username'])){
    header('location: login.php');
  }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h3 class="text-center text-success mt-3">Welcome <?php echo $_SESSION['username']; ?>!</h3>

    <div class="container text-center">
      <a href="logout.php" class="btn btn-primary btn-sm">
        Logout
      </a>
    </div>
  </body>
</html>