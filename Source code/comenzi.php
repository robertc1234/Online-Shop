<?php 
  session_start();
  if(!isset($_SESSION['login_user']))
  {
    header('Location: login_angajat_base.php');
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
      <li class="active"><a href="cont_curier.php">Home</a></li>
    </ul>
  </div>
</nav> 
<div class="container">
  <h2>Produse</h2>
  <p>Lista produselor ce trebuie livrate</p>
  <div class="panel-group">
  <?php
  $user_id=$_SESSION['login_user'];
  $cerere="select A.ID_angajat from angajati A where User='".$user_id."'";
  $result2=mysqli_query($con,$cerere);
  $angajat_id=mysqli_fetch_row($result2);
  $sql="select CP.Cod_comanda, C.Nume, C.Prenume, C.Nr_telefon, C.Strada, C.Nr, C.Oras, C.Judet, CP.Data_comenzii,CP.Status,P.Producator, P.Model from clienti C  join clienti_produse CP ON C.ID_client=CP.ID_client  join produse P on P.ID_produs=CP.ID_produs where CP.ID_angajat='".$angajat_id[0]."' order by CP.Cod_comanda"; 
   $result=mysqli_query($con,$sql);
   $contor=1;
   $ok=0;
  if(isset($_SESSION['response_b_livrare'])){
          $sesiune=$_SESSION['response_b_livrare'];
          echo("<p>$sesiune</p>");
          $_SESSION['response_b_livrare']=null;
        }
  //cat timp interogarea imi returneaza informatii legate de comenzi, afisez in pagina de comenzi fiecare inregistrare
  while($row=mysqli_fetch_array($result)){
    if($row[9]=="validat"){
        $ok=1;
    echo("<div class=\"panel panel-default\">");
      echo("<div class=\"panel-heading\">");
        echo("<h4 class=\"panel-title\">");
        $link_address="#collapse$contor";
        echo "<a data-toggle=\"collapse\" href='$link_address'>Cod_comanda: $row[0]</a>";
        echo("</h4>");
        echo("</div>");
        echo("</div>");
        echo("<div id=\"collapse$contor\" class=\"panel-collapse collapse\">");
    
      echo("<div class=\"panel-body\">");
      echo("Nume client: $row[1]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Prenume client: $row[2]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Nr. telefon: $row[3]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Adresa: Strada $row[4], Nr. $row[5], Oras $row[6], Judet $row[7]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Data comenzii: $row[8]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Status comanda: $row[9]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Produs : $row[10] $row[11]");
      echo("</div>");
      $nume_buton="$row[0]";
      echo("<form method=\"POST\" action=\"buton_livrare.php\">");
      echo("<button type=\"submit\" class=\"btn btn-default\" name=\"$row[0]\">Livrat</button>");
      echo("</form>");
      echo("</div>");
      $contor=$contor+1;
   
        }

      }
      //daca interogarea nu returneaza nimic inseamna ca nu exista comenzi care trebuie livrate
      if($ok==0)
            echo("Nu sunt comenzi care trebuie livrate");

       ?>
      
    </div>
</div>
    
</body>
</html>

