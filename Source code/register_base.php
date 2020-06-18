<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <style>
 
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

body {
  background: #456;
  font-family: 'Open Sans', sans-serif;
}

.login {
  width: 800px;
  margin: 16px auto;
  font-size: 16px;
}

.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="text"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

.login input[type="text"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input[type="submit"] {
  background: #28d;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #17c;
}

.login input[type="submit"]:focus {
  border-color: #05a;
}
        </style>
    </head>

    <body>
            <div class="login">
                    <div class="login-triangle"></div>
                    
                    <h2 class="login-header">SIGN UP

                    <?php
                    session_start();
                    if(isset($_SESSION['register_client'])){
                        $sesiune=$_SESSION['register_client'];
                        echo("<p style = 'color: red;'>$sesiune</p>");
                        $_SESSION['register_client']=null;
                     }
                     if(isset($_SESSION['incomplet'])){
                      $sesiune=$_SESSION['incomplet'];
                      echo("<p style = 'color: red;'>$sesiune</p>");
                      $_SESSION['incomplet']=null;
                   }
                    ?>
                  </h2>
                    <form class="login-container" method="POST" action="register.php">
                      <p><input type="nume" placeholder="Nume" id="nume" name="nume"></p>
                      <p><input type="prenume" placeholder="Prenume" id="prenume" name="prenume"></p>
                      <p><input type="cnp" placeholder="CNP" id="cnp" name="cnp"></p>
                      <p><input type="username" placeholder="Username" id="username" name="username"></p>
                      <p><input type="password" placeholder="Password" id="parola" name="parola"></p>
                      <p><input type="email" placeholder="Email" id="email" name="email"></p>
                      <p><input type="text" placeholder="Nr Telefon" id="nr_tel" name="nr_tel"></p>
                      <p><input type="text" placeholder="Sex" id="sex" name="sex"></p>
                      <p><input type="text" placeholder="Data_nastere" id="zi_n" name="data_nastere"></p>
                      <p><input type="text" placeholder="Strada" id="strada" name="strada"></p>
                      <p><input type="text" placeholder="Nr" id="nr" name="nr"></p>
                      <p><input type="text" placeholder="Oras" id="oras" name="oras"></p>
                      <p><input type="text" placeholder="Judet" id="judet" name="judet"></p>
                      <p><input type="submit" value="REGISTER"></p>
                    </form>
                  </div>
    </body>
</html>