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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Stergere Cont Angajat</a>
          <?php
              if(isset($_SESSION['response_s'])){
                  $sesiune=$_SESSION['response_s'];
                  echo("<p style = 'color: red;' >$sesiune</p>");
                  $_SESSION['response_s']=null;

              }
           ?>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
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
</div>
    
</body>
</html>
