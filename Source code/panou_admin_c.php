<?php
session_start();
  if(!isset($_SESSION['login_user']))
  {
    header('Location: login_angajat_base.php');
  }
  ?>

<!DOCTYPE html>
<html>
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
  <h2>Panou Administrator</h2>
  <div class="panel-group" id="accordion">
  <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Adaugare curier</a>
          <?php
              if(isset($_SESSION['response_ac'])){
                  $sesiune=$_SESSION['response_ac'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_ac']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">Curier nou
            
            <div class="container">
                <form method="POST" action="adaugare_curier.php">
                    <div class="form-group">
                    <label>Nume:</label>
                    <input type="text" class="form-control" placeholder="Nume" id="nume" name="nume">
                    </div>
                    <div class="form-group">
                    <label>Prenume:</label>
                    <input type="text" class="form-control" placeholder="Prenume" id="prenume" name="prenume">
                    </div>
                    <div class="form-group">
                    <label>CNP:</label>
                    <input type="text" class="form-control" placeholder="CNP" id="cnp" name="cnp">
                    </div>
                    <div class="form-group">
                    <label>Sex:</label>
                    <input type="text" class="form-control" placeholder="Sex" id="sex" name="sex">
                    </div>
                    <div class="form-group">
                    <label>Data nasterii:</label>
                    <input type="text" class="form-control" placeholder="Data nasterii" id="data_n" name="data_n">
                    </div>
                    <div class="form-group">
                    <label>Strada:</label>
                    <input type="text" class="form-control" placeholder="Strada" id="strada" name="strada">
                    </div>
                    <div class="form-group">
                    <label>Nr:</label>
                    <input type="text" class="form-control" placeholder="Nr" id="nr" name="nr">
                    </div>
                    <div class="form-group">
                    <label>Oras:</label>
                    <input type="text" class="form-control" placeholder="Oras" id="oras" name="oras">
                    </div>
                    <div class="form-group">
                    <label>Judet:</label>
                    <input type="text" class="form-control" placeholder="Judet" id="judet" name="judet">
                    </div>
                    <div class="form-group">
                    <label>User:</label>
                    <input type="text" class="form-control" placeholder="User" id="username" name="username">
                    </div>
                    <div class="form-group">
                    <label for="pwd">Parola:</label>
                    <input type="password" class="form-control" placeholder="Parola" id="password" name="password">
                    </div>
                    <div class="form-group">
                    <label>Nr. telefon:</label>
                    <input type="text" class="form-control" placeholder="Nr. telefon" id="nr_tel" name="nr_tel">
                    </div>
                    <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                    </div>
                    <div class="form-group">
                    <label>Functie:</label>
                    <input type="functie" class="form-control" placeholder="functie" id="functie" name="functie">
                    </div>
                    <div class="form-group">
                    <label>ID_masina:</label>
                    <input type="id_masina" class="form-control" placeholder="ID_masina" id="id_masina" name="id_masina">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Update Curier</a>
          <?php
              if(isset($_SESSION['response_uc'])){
                  $sesiune=$_SESSION['response_uc'];
                  echo("<p style = 'color: red;'>$sesiune</p>");
                  $_SESSION['response_uc']=null;

              }
           ?>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="update_curier.php">
                 
                    <div class="form-group">
                    <label>User Curier:</label>
                    <input type="text" class="form-control" placeholder="User Curier" id="uc" name="uc">
                    </div>
                    <div class="form-group">
                    <label>Nr. inmatriculare:</label>
                    <input type="text" class="form-control" placeholder="Nr. inmatriculare" id="nr_inm" name="nr_inm">
                    </div>
                   
                    <button type="submit" class="btn btn-default" value="submit">Update</button>
                </form>
                </div>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Adaugare masina de livrari</a>
          <?php
              if(isset($_SESSION['response_am'])){
                  $sesiune=$_SESSION['response_am'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_am']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="adaugare_masina.php">
                 
                    <div class="form-group">
                    <label>Marca masina:</label>
                    <input type="text" class="form-control" placeholder="Marca masina" id="masina" name="masina">
                    </div>
                    <div class="form-group">
                    <label>Nr. inmatriculare:</label>
                    <input type="text" class="form-control" placeholder="Nr. inmatriculare" id="nr_inmatriculare" name="nr_inmatriculare">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Masini</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        
        <?php

          $host="localhost";
          $user="root";
          $password="";
          $db="proiect bd";
 
          $con=mysqli_connect($host,$user,$password);
          mysqli_select_db($con,$db);
          $query=mysqli_query($con,"select M.Marca_masina, M.Nr_inmatriculare from `masini_livrare` M");
          $c=0;
          while($row=mysqli_fetch_row($query)){

              $c=1;
              echo("<div class=\"panel-body\">");
              echo(" Marca masina: $row[0] Nr. inmatriculare: $row[1] ");
              echo("</div>");

          }
          if($c==0)
              echo("Nu sunt masini in baza de date");

        ?>

    </div>
  </div> 
  <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Stergere Masina</a>
          <?php
              if(isset($_SESSION['response_sm'])){
                  $sesiune=$_SESSION['response_sm'];
                  echo("<p style = 'color: red;'>$sesiune</p>");
                  $_SESSION['response_sm']=null;

              }
           ?>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="stergere_masina.php">
                 
                    <div class="form-group">
                    <label>Nr_inmatriculare:</label>
                    <input type="nr_inmatriculare" class="form-control" placeholder="Nr. Inmatriculare" id="nr_inmatriculare" name="nr_inmatriculare">
                    </div>
                   
                    <button type="submit" class="btn btn-default" value="submit">Stergere</button>
                </form>
                </div>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Comenzi nevalidate</a>
          
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        
        <?php

          $host="localhost";
          $user="root";
          $password="";
          $db="proiect bd";
 
          $con=mysqli_connect($host,$user,$password);
          mysqli_select_db($con,$db);
          $query=mysqli_query($con,"select * from clienti_produse");
          $contor=0;
          while($row=mysqli_fetch_row($query)){

            if($row[5]=='0'){
              $contor=1;
              echo("<div class=\"panel-body\">");
              echo("Comanda: Cod_Comanda: $row[0]     ID_client:    $row[1]    ID_produs: $row[2]     Data_comenzii: $row[4]    Status: $row[5]");
              echo("</div>");
            }

          }
          if($contor==0)
              echo("Nu sunt comenzi care trebuie validate");

        ?>

    </div>
  </div> 
  <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Gestionare comenzi</a>
          <?php
              if(isset($_SESSION['response_gc'])){
                  $sesiune=$_SESSION['response_gc'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_gc']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="gestionare_comenzi.php">
                 
                    <div class="form-group">
                    <label>Cod_comanda:</label>
                    <input type="id_comanda" class="form-control" placeholder="Cod Comanda" id="id_comanda" name="id_comanda">
                    </div>
                    <div class="form-group">
                    <label>ID_angajat:</label>
                    <input type="id_angajat" class="form-control" placeholder="ID Angajat" id="id_angajat" name="id_angajat">
                    </div>
                   
                    <div class="form-group">
                    <label>Status:</label>
                    <input type="text" class="form-control" placeholder="Status" id="status" name="status">
                    </div>
                    <button type="submit" class="btn btn-default" value="submit">Submit</button>
                </form>
                </div>

        </div>
      </div>
    </div>
</div>
    
</body>
</html>
