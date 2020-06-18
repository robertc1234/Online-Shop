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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Adaugare angajat nou</a>
          <?php
              if(isset($_SESSION['response'])){
                  $sesiune=$_SESSION['response'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">Angajat nou
            
            <div class="container">
                <form method="POST" action="admin_angajati.php">
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
                    <label>Departament:</label>
                    <input type="text" class="form-control" placeholder="Departament" id="departament" name="departament">
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
                    <button type="submit" class="btn btn-default" value="submit">Submit</button>
                </form>
                </div>


        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Update Angajat</a>
          <?php
              if(isset($_SESSION['response_ua'])){
                  $sesiune=$_SESSION['response_ua'];
                  echo("<p style = 'color: red;'>$sesiune</p>");
                  $_SESSION['response_ua']=null;

              }
           ?>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="update_angajat.php">
                 
                    <div class="form-group">
                    <label>User:</label>
                    <input type="user" class="form-control" placeholder="User" id="usern" name="usern">
                    </div>
                    <div class="form-group">
                    <label>Functie noua:</label>
                    <input type="fct" class="form-control" placeholder="Functie noua" id="fct" name="fct">
                    </div>
                    <div class="form-group">
                    <label>Departament:</label>
                    <input type="dep" class="form-control" placeholder="Departament" id="dep" name="dep">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Adaugare curier</a>
          <?php
              if(isset($_SESSION['response_ac'])){
                  $sesiune=$_SESSION['response_ac'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_ac']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Update Curier</a>
          <?php
              if(isset($_SESSION['response_uc'])){
                  $sesiune=$_SESSION['response_uc'];
                  echo("<p style = 'color: red;'>$sesiune</p>");
                  $_SESSION['response_uc']=null;

              }
           ?>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Adaugare produse</a>
          <?php
              if(isset($_SESSION['response_ap'])){
                  $sesiune=$_SESSION['response_ap'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_ap']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="adaugare_produse.php">
                 
                    <div class="form-group">
                    <label>Producator:</label>
                    <input type="text" class="form-control" placeholder="Producator" id="producator" name="producator">
                    </div>
                    <div class="form-group">
                    <label>Model:</label>
                    <input type="text" class="form-control" placeholder="Model" id="model" name="model">
                    </div>
                    <div class="form-group">
                    <label>ID specificatii:</label>
                    <input type="text" class="form-control" placeholder="ID specificatii" id="id_spec" name="id_spec">
                    </div>
                    <div class="form-group">
                    <label>Pret:</label>
                    <input type="text" class="form-control" placeholder="Pret" id="pret" name="pret">
                    </div>
                    <div class="form-group">
                    <label>Imagine:</label>
                    <input type="text" class="form-control" placeholder="Imagine" id="imagine" name="imagine">
                    </div>
                    <div class="form-group">
                    <label>Stoc:</label>
                    <input type="text" class="form-control" placeholder="Stoc" id="stoc" name="stoc">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Update Stoc</a>
          <?php
              if(isset($_SESSION['response_stoc'])){
                  $sesiune=$_SESSION['response_stoc'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_stoc']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="update_stoc.php">
                 
                    <div class="form-group">
                    <label>Cod produs:</label>
                    <input type="text" class="form-control" placeholder="Cod produs" id="cod_produs" name="cod_produs">
                    </div>
                    <div class="form-group">
                    <label>Stoc:</label>
                    <input type="text" class="form-control" placeholder="Stoc" id="stoc" name="stoc">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Adaugare specificatii</a>
          <?php
              if(isset($_SESSION['response_as'])){
                  $sesiune=$_SESSION['response_as'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_as']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="adaugare_specificatii.php">
                 
                    <div class="form-group">
                    <label>Procesor:</label>
                    <input type="text" class="form-control" placeholder="Procesor" id="procesor" name="procesor">
                    </div>
                    <div class="form-group">
                    <label>Ram:</label>
                    <input type="text" class="form-control" placeholder="Ram" id="ram" name="ram">
                    </div>
                    <div class="form-group">
                    <label>Capacitate stocare:</label>
                    <input type="text" class="form-control" placeholder="Capacitate stocare" id="cap_stoc" name="cap_stoc">
                    </div>
                    <div class="form-group">
                    <label>Tip stocare:</label>
                    <input type="text" class="form-control" placeholder="Tip stocare" id="tip_stoc" name="tip_stoc">
                    </div>
                    <div class="form-group">
                    <label>Placa Video:</label>
                    <input type="text" class="form-control" placeholder="Placa Video" id="placa_video" name="placa_video">
                    </div>
                    <div class="form-group">
                    <label>Software:</label>
                    <input type="text" class="form-control" placeholder="Software" id="soft" name="soft">
                    </div>
                    <div class="form-group">
                    <label>Memorie video:</label>
                    <input type="text" class="form-control" placeholder="Memorie video" id="mem_vid" name="mem_vid">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Adaugare departament nou</a>
          <?php
              if(isset($_SESSION['new_dep'])){
                  $sesiune=$_SESSION['new_dep'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['new_dep']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="adaugare_departament.php">
                 
                    <div class="form-group">
                    <label>Nume departament:</label>
                    <input type="text" class="form-control" placeholder="Nume_departament" id="departament" name="departament">
                    </div>
                    <div class="form-group">
                    <label>Cod departament:</label>
                    <input type="text" class="form-control" placeholder="Cod departament" id="cod" name="cod">
                    </div>
                    <div class="form-group">
                    <label>ID Manager:</label>
                    <input type="text" class="form-control" placeholder="ID Manager" id="id_manager" name="id_manager">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Adaugare masina de livrari</a>
          <?php
              if(isset($_SESSION['response_am'])){
                  $sesiune=$_SESSION['response_am'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_am']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse9" class="panel-collapse collapse">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">Comenzi nevalidate</a>
        </h4>
      </div>
      <div id="collapse10" class="panel-collapse collapse">
        
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
              echo("Comanda:  Cod_comanda: $row[0]     ID_client:    $row[1]    ID_produs: $row[2]     Data_comenzii: $row[4]    Status: $row[5]");
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">Gestionare comenzi</a>
          <?php
              if(isset($_SESSION['response_gc'])){
                  $sesiune=$_SESSION['response_gc'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_gc']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse11" class="panel-collapse collapse">
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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">Produse</a>
        </h4>
      </div>
      <div id="collapse12" class="panel-collapse collapse">
        
        <?php

          $host="localhost";
          $user="root";
          $password="";
          $db="proiect bd";
 
          $con=mysqli_connect($host,$user,$password);
          mysqli_select_db($con,$db);
          $query=mysqli_query($con,"select P.ID_produs, P.Producator,P.Model,P.Pret from produse P");
          $c=0;
          while($row=mysqli_fetch_row($query)){

              $c=1;
              echo("<div class=\"panel-body\">");
              echo(" Cod_produs: $row[0]     Producator:    $row[1]    Model: $row[2]     Pret: $row[3]");
              echo("</div>");

          }
          if($c==0)
              echo("Nu sunt produse care trebuie afisate");

        ?>

    </div>
  </div> 
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse13">Stergere Produs</a>
          <?php
              if(isset($_SESSION['response_sp'])){
                  $sesiune=$_SESSION['response_sp'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_sp']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse13" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="stergere_produs.php">
                 
                    <div class="form-group">
                    <label>Cod_produs:</label>
                    <input type="id_produs" class="form-control" placeholder="Cod Produs" id="id_produs" name="id_produs">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse14">Specificatii produse</a>
        </h4>
      </div>
      <div id="collapse14" class="panel-collapse collapse">
        
        <?php

          $host="localhost";
          $user="root";
          $password="";
          $db="proiect bd";
 
          $con=mysqli_connect($host,$user,$password);
          mysqli_select_db($con,$db);
          $query=mysqli_query($con,"select ST.ID_specificatii, ST.Procesor,ST.Ram,ST.Cap_stocare,ST.Tip_stocare,ST.Placa_video,ST.Software,ST.Memorie_video from `specificatii tehnice` ST");
          $c=0;
          while($row=mysqli_fetch_row($query)){

              $c=1;
              echo("<div class=\"panel-body\">");
              echo(" Cod_specificatii: $row[0] Procesor: $row[1] Ram: $row[2] Cap_stocare: $row[3] Tip_stocare: $row[4] Placa_video: $row[5] Software: $row[6] Memorie_video: $row[7]");
              echo("</div>");

          }
          if($c==0)
              echo("Nu sunt specificate care trebuie afisate");

        ?>

    </div>
  </div> 
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse15">Stergere lista specificatii produs</a>
          <?php
              if(isset($_SESSION['response_ss'])){
                  $sesiune=$_SESSION['response_ss'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_ss']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse15" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="stergere_specificatii.php">
                 
                    <div class="form-group">
                    <label>Cod_specificatii:</label>
                    <input type="id_produs" class="form-control" placeholder="Cod Specificatii" id="id_specificatie" name="id_specificatie">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse16">Angajati</a>
        </h4>
      </div>
      <div id="collapse16" class="panel-collapse collapse">
        
        <?php

          $host="localhost";
          $user="root";
          $password="";
          $db="proiect bd";
 
          $con=mysqli_connect($host,$user,$password);
          mysqli_select_db($con,$db);
          $query=mysqli_query($con,"select A.Nume, A.Prenume, A.CNP,A.Sex, A.Data_nasterii, A.User, A.Email, A.Functie, (select D.Nume from departamente D where D.ID_departament=A.ID_departament) from angajati A");
          $c=0;
          while($row=mysqli_fetch_row($query)){

              $c=1;
              echo("<div class=\"panel-body\">");
              echo(" Nume: $row[0] $row[1] CNP: $row[2] Sex: $row[3] Data nasterii: $row[4] User: $row[5] Email: $row[6] Functie: $row[7] Departament $row[8]");
              echo("</div>");

          }
          if($c==0)
              echo("Nu sunt angajati in baza de date");

        ?>

    </div>
  </div> 
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse17">Stergere Cont Angajat</a>
          <?php
              if(isset($_SESSION['response_s'])){
                  $sesiune=$_SESSION['response_s'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_s']=null;

              }
           ?>
        </h4>
      </div>
      <div id="collapse17" class="panel-collapse collapse">
        <div class="panel-body">

        <div class="container">
                <form method="POST" action="stergere_angajat.php">
                 
                    <div class="form-group">
                    <label>User_angajat:</label>
                    <input type="id_produs" class="form-control" placeholder="User Angajat" id="user_angajat" name="user_angajat">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse18">Masini</a>
        </h4>
      </div>
      <div id="collapse18" class="panel-collapse collapse">
        
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse19">Stergere Masina</a>
          <?php
              if(isset($_SESSION['response_sm'])){
                  $sesiune=$_SESSION['response_sm'];
                  echo("<p style = 'color: red;'>$sesiune</p>");
                  $_SESSION['response_sm']=null;

              }
           ?>
        </h4>
      </div>
      <div id="collapse19" class="panel-collapse collapse">
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
</div>
    
</body>
</html>
