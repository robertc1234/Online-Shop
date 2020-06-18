<?php 
  session_start();
  if(!isset($_SESSION['login_user']))
  {
    header('Location: login_angajat_base.php');
  }
?>

<?php

    if(isset($_POST['logout']))
    {
        session_destroy();
        header('Location: Home Page.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PC Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  div.a {
  text-align: center;
}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PC Shop</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="Home Page.php">Home</a></li>
      <li class="active"><a href="profil_angajat.php">Profile</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" >
      <FORM method="POST" action="">
      <li style="margin-top:20%;">
        <span class="glyphicon glyphicon-log-out"></span>
        <input type="submit" value="Log out" name="logout" style="background:none; border:none; color:white;" > 
      </li>
      </FORM>
      
    </ul>
  </div>
</nav>
  
<div class="container">
  <div class="a">
    <h1>Bine ati venit!!!</h1>
    </div>
</div>


</body>
</html>
