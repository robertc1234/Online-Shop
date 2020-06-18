<!DOCTYPE html>
<html lang="en">
<head>
  <title>PC Shop</title>
  <meta charset="utf-8">
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
      <li class="active"><a href="Home Page.php">Home</a></li>
      <li><a href="produse.php">Produse</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register_base.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <ul class="dropdown-menu">
          <li><a href="login_clienti_base.php">Client</a></li>
          <li><a href="login_angajat_base.php">Angajat</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  <?php
      $host="localhost";
      $user="root";
      $password="";
      $db="proiect bd";
       
      $con=mysqli_connect($host,$user,$password);
      mysqli_select_db($con,$db);

      $sql1=mysqli_query($con,"select * from (select CP.ID_produs, COUNT(CP.ID_produs) as number, P.Producator, P.Model,P.Pret, P.Imagine_produs from `clienti_produse` CP join produse P on CP.ID_produs=P.ID_produs group by CP.ID_produs) T where T.number=(select MAX(Q.nr) from (select CP.ID_produs, COUNT(CP.ID_produs) as nr, P.Producator, P.Model,P.Pret, P.Imagine_produs from `clienti_produse` CP join produse P on CP.ID_produs=P.ID_produs group by CP.ID_produs) as Q)");
      $row=mysqli_fetch_row($sql1);//caut cel mai vandut produs
      $sql2=mysqli_query($con,"select * from (select CP.ID_angajat, COUNT(CP.ID_angajat) as numar, A.Nume,A.Prenume from `clienti_produse` CP join angajati A on CP.ID_angajat=A.ID_angajat group by CP.ID_angajat) T where T.numar=(select MAX(Q.nrr) from (select CP.ID_angajat, COUNT(CP.ID_angajat) as nrr, A.Nume, A.Prenume  from `clienti_produse` CP join angajati A on CP.ID_angajat=A.ID_angajat group by CP.ID_angajat) as Q)");
      $row2=mysqli_fetch_row($sql2);//caut curierul care a efectuat cele mai multe livrari


  ?>
  <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Cel mai vandut produs</a>
      </h4>
      <?php echo("<img src='$row[5]' width='90px' height='70px'>"); ?>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">Producator: <?php echo("$row[2]"); ?> </div>
      <div class="panel-body">Model: <?php echo("$row[3]"); ?> </div>
      <div class="panel-body">Pret: <?php echo("$row[4]"); ?> </div>
    </div>
    </div>
  <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2">Angajatul lunii</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">Nume: <?php echo("$row2[2]"); ?> </div>
      <div class="panel-body">Prenume: <?php echo("$row2[3]"); ?> </div>
      <div class="panel-body">Nr. livrari: <?php echo("$row2[1]"); ?> </div>
    </div>
    </div>

</div>


</body>
</html>
