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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Adaugare produse</a>
          <?php
              if(isset($_SESSION['response_ap'])){
                  $sesiune=$_SESSION['response_ap'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_ap']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Update Stoc</a>
          <?php
              if(isset($_SESSION['response_stoc'])){
                  $sesiune=$_SESSION['response_stoc'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_stoc']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Adaugare specificatii</a>
          <?php
              if(isset($_SESSION['response_as'])){
                  $sesiune=$_SESSION['response_as'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_as']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Produse</a>
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Stergere Produs</a>
          <?php
              if(isset($_SESSION['response_sp'])){
                  $sesiune=$_SESSION['response_sp'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_sp']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Stergere lista specificatii produs</a>
          <?php
              if(isset($_SESSION['response_ss'])){
                  $sesiune=$_SESSION['response_ss'];
                  echo("<p>$sesiune</p>");
                  $_SESSION['response_ss']=null;
              }
           ?>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
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
</div>
    
</body>
</html>
