<?php
 session_start();
 $user=$_SESSION['login_user'];

 if(!isset($user))
 {
   header('Location: login_angajat_base.php');
 }
 $connection = new mysqli('localhost','root','','proiect bd');
 $data = $connection->query("SELECT Nume, Prenume, CNP, Sex, Strada, Nr, Oras, Judet FROM angajati WHERE User='$user'");
 $row=mysqli_fetch_assoc($data);

 $nume=$row['Nume'];
 $prenume=$row['Prenume'];
 $cnp=$row['CNP'];
 $sex=$row['Sex'];
 $strada=$row['Strada'];
 $nr=$row['Nr'];
 $oras=$row['Oras'];
 $judet=$row['Judet'];
 
?>

<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PC Shop</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="cont_manager.php">Home</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <h2>Profilul meu</h2>
  <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Profil</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">Nume: <?php echo("$nume"); ?> </div>
      <div class="panel-body">Prenume: <?php echo("$prenume"); ?> </div>
      <div class="panel-body">CNP: <?php echo("$cnp"); ?> </div>
      <div class="panel-body">Sex: <?php echo("$sex"); ?> </div>
      <div class="panel-body">User: <?php echo("$user"); ?> </div>
      <div class="panel-body">Adresa: <?php echo("Strada: $strada,");echo("Nr: $nr,");echo("Oras: $oras,");echo("Judet: $judet,"); ?> </div>
    </div>
  </div>
  <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Editare date personale</a>
          <?php
              if(isset($_SESSION['response_eda'])){
                  $sesiune=$_SESSION['response_eda'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_eda']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="editare_date_angajat.php">
                 
                    <div class="form-group">
                    <label>User:</label>
                    <input type="text" class="form-control" placeholder="User" id="user" name="user">
                    </div>
                    <div class="form-group">
                    <label>Parola:</label>
                    <input type="password" class="form-control" placeholder="Parola" id="parola" name="parola">
                    </div>
                    <div class="form-group">
                    <label>Nr. telefon:</label>
                    <input type="text" class="form-control" placeholder="Nr. telefon" id="nr_telefon" name="nr_telefon">
                    </div>
                    <button type="submit" class="btn btn-default" value="submit">Submit</button>
                </form>
                </div>
            </div>
        </div>
      </div>
      <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Editare adresa</a>
          <?php
              if(isset($_SESSION['response_eaa'])){
                  $sesiune=$_SESSION['response_eaa'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_eaa']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="editare_adresa_angajat.php">
                 
                    <div class="form-group">
                    <label>Strada:</label>
                    <input type="text" class="form-control" placeholder="Strada" id="strada" name="strada">
                    </div>
                    <div class="form-group">
                    <label>Nr.:</label>
                    <input type="text" class="form-control" placeholder="Nr." id="nr" name="nr">
                    </div>
                    <div class="form-group">
                    <label>Oras:</label>
                    <input type="text" class="form-control" placeholder="Oras" id="oras" name="oras">
                    </div>
                    <div class="form-group">
                    <label>Judet:</label>
                    <input type="text" class="form-control" placeholder="Judet" id="judet" name="judet">
                    </div>
                    <button type="submit" class="btn btn-default" value="submit">Submit</button>
                </form>
                </div>

        </div>
      </div>
    </div>

  </div>
</div>
    

</body>
</html>
