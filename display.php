<?php
include './include/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Details</title>
    <link rel="stylesheet" href="style.css?va=1" /> <!-- Linking the CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

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

<!-- Table Heading -->
<h2 class="table-heading">Students Details</h2>

<!-- Table -->
<div class="table_container">
  <table class="styled-table">
    <thead>
      <tr>
        <th>Sl No</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Place</th>
        <th>Action</th>
      </tr>
    </thead>
    
    <tbody>

    <?php 
    $select_query="select * from crud";
    $result=mysqli_query($con, $select_query);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
      $id=$row['id'];
      $username=$row['username'];
      $email=$row['email'];
      $phone=$row['phone'];
      $place=$row['place'];

      echo "<tr>
        <td>$id</td>
        <td>$username</td>
        <td>$email</td>
        <td>$phone</td>
        <td>$place</td>
        <td>
          <a href='update.php?update_id=$id'><i class='fa fa-pen-to-square'></i></a>
          <a href='delete.php?delete_id=$id'><i class='fa fa-trash'></i></a>
        </td>
      </tr>";

    }
    }else{
      die(mysqli_error($con));
    }


    ?>
      <!-- <tr>
        <td>$id</td>
        <td>$username</td>
        <td>$email</td>
        <td>$phone</td>
        <td>$place</td>
        <td>
          <a href='update.php'><i class='fa fa-pen-to-square'></i></a>
          <a href='delete.php'><i class='fa fa-trash'></i></a>
        </td>
      </tr> -->




    </tbody>
  </table>
</div>



<!-- Footer-->
<footer>
    <p>All rights reserved - Made with 🪐 by Sarathraj R L</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
