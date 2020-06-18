<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style>
 
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

body {
  background: #456;
  font-family: 'Open Sans', sans-serif;
}

.login {
  width: 400px;
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
                    
                    <h2 class="login-header">Log in

                    <?php
                    session_start();
                      if(isset($_SESSION['er_log_client'])){
                        echo("<p style='color: red;'>Parola sau user incorecte</p>");
                        $_SESSION['er_log_client']=null;
                    }
                    ?>

                    </h2>
                  
                    <form class="login-container" method="POST" action="login_clienti.php">
                      <p><input type="text" placeholder="Username" id="username" name="username"></p>
                      <p><input type="password" placeholder="Password" id="password" name="password"></p>
                      <p><input type="submit" value="Sign in"></p>
                    </form>
                  </div>
    </body>
</html>