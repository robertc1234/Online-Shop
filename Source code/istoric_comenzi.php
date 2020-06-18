<?php 
  session_start();
  if(!isset($_SESSION['login_client']))
  {
    header('Location: login_clienti_base.php');
  }
?>

<?php 
$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);   
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PC Shop</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="cont_client.php">Home</a></li>
    </ul>
  </div>
</nav> 
<div class="container">
  <h2>Istoric Comenzi</h2>
  <div class="panel-group">
  <?php
  $user_id=$_SESSION['login_client'];
  $sql="select CP.Data_comenzii,C.Nume, C.Prenume, P.Producator, P.Model, A.Nume, A.Prenume, CP.Cod_comanda, CP.Status  from `clienti_produse` CP join clienti C on CP.ID_client=C.ID_client join produse P on P.ID_produs=CP.ID_produs join angajati A on CP.ID_angajat=A.ID_angajat where C.User='".$user_id."'"; 
   $result=mysqli_query($con,$sql);
   
   $contor=1;

   if(isset($_SESSION['response_ic'])){
       $sesiune=$_SESSION['response_ic'];
       echo("<p>$sesiune</p>");
       $_SESSION['response_ic']=null;
   }

  while($row=mysqli_fetch_array($result)){
        
    echo("<div class=\"panel panel-default\">");
      echo("<div class=\"panel-heading\">");
        echo("<h4 class=\"panel-title\">");
        $link_address="#collapse$contor";
        echo "<a data-toggle=\"collapse\" href='$link_address'>Data comenzii: $row[0]</a>";
        echo("</h4>");
        echo("</div>");
        echo("</div>");
        echo("<div id=\"collapse$contor\" class=\"panel-collapse collapse\">");
    
      echo("<div class=\"panel-body\">");
      echo("Nume beneficiar: $row[1] $row[2]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Produs comandat: $row[3] $row[4]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Nume Curier: $row[5] $row[6]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Cod comanda: $row[7]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Status: $row[8]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("<form method=\"POST\" action=\"stergere_comanda.php\">");
      echo("<button type=\"submit\" class=\"btn btn-default\" name=\"$row[7]\">Stergere comanda</button>");
      echo("</form>");
      echo("</div>");
      echo("</div>");

      $contor=$contor+1;

      }
      if($contor==0)
            echo("Istoricul comenzilor este gol");

       ?>
      
    </div>
</div>
    
</body>
</html>

