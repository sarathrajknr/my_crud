<?php
include './include/connection.php';

if(isset($_GET['update_id'])){
  $uid=$_GET['update_id'];
  /*selecting data from database table, so that we can display in input fields*/

  $select_query="Select * from `crud` where id=$uid";
  $result_query=mysqli_query($con,$select_query);
  $row=mysqli_fetch_assoc($result_query);
  $username=$row['username'];
  $email=$row['email'];
  $phone=$row['phone'];
  $place=$row['place']; /* need to pass this information to input field using value="<?php echo $username ?>" */

  /* new data taken from form */

  if(isset($_POST['update'])){
    $username_update=$_POST['username'];
    $email_update=$_POST['email'];
    $phone_update=$_POST['phone'];
    $place_update=$_POST['place'];

  /* updating new data inside database table*/

  $update_query="update crud set username='$username_update', email='$email_update', phone='$phone_update', place='$place_update' where id=$uid";
  $result_query=mysqli_query($con,$update_query);
  if($result_query){
    echo "<script>alert('Data updated successfully')</script>";
    echo "<script>window.open('display.php','_self')</script>";
  }else{
    die(mysqli_error($con));
  }
    
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Details</title>
    <link rel="stylesheet" href="style.css?va=1" /> <!-- Linking the CSS file -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- Navbar content -->

<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Students Record</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Students Details</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Edit Form -->
<div class="form-container">
    <h2>Edits Students Details</h2>
    <form action="" method="post">
        
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username ?>"/>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email ?>"/>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo $phone ?>"/>
            </div>
            <div class="form-group">
                <label for="place">Place:</label>
                <input type="text" id="place" name="place" value="<?php echo $place ?>"/>
            </div>
            <div class="form-buttons">
                <input type="submit" class="button" name="update" value="Update" />   
            </div>
    
    </form>
</div>




<!-- Footer-->
<footer>
    <p>All rights reserved - Made with 🪐 by Sarathraj R L</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
