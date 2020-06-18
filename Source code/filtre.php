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
      <li class="active"><a href="produse.php">Home</a></li>
    </ul>
  </div>
</nav> 
<div class="container">
  <h2>Produse</h2>
  <p>Faceti click pe numele laptop-ului pentru a vedea specificatiile acestuia</p>
  <div class="panel-group">

  <?php
  $host="localhost";
  $user="root";
  $password="";
  $db="proiect bd";
   
  $con=mysqli_connect($host,$user,$password);
  mysqli_select_db($con,$db);
  
      $prod=$_POST['producator'];
      $model=$_POST['model'];
      $cpu=$_POST['procesor'];
      $ram=$_POST['ram'];
      $tip_stoc=$_POST['tip_stoc'];
      $mem_vid=$_POST['mem_vid'];

          
   $sql="select P.Producator,P.Model,ST.Procesor,ST.Ram,ST.Cap_stocare,ST.Tip_stocare,ST.Placa_video,ST.Software,ST.Memorie_video,P.ID_produs, P.Imagine_produs from produse P join `specificatii tehnice` ST on P.ID_spec=ST.ID_specificatii where P.Producator='".$prod."' and P.Model='".$model."' and ST.Procesor='".$cpu."' and ST.Ram='".$ram."' and ST.Tip_stocare='".$tip_stoc."' and Memorie_video='".$mem_vid."'";
   $result=mysqli_query($con,$sql);
   $contor=1;//folosesc un contor pe baza caruia o sa definesc id-ul din div-ul collapse
   $vector=array();
  while($row=mysqli_fetch_array($result)){
    $vector[$contor]=$row[9];
    echo("<div class=\"panel panel-default\">");
      echo("<div class=\"panel-heading\">");
        echo("<h4 class=\"panel-title\">");
        $link_address="#collapse$contor";
        echo "<a data-toggle=\"collapse\" href='$link_address'>$row[0] $row[1]</a>";
        
        echo("</h4>");
        echo("<img src='$row[10]' width='90px' height='70px'>");
    echo("</div>");
    echo("</div>");
    echo("<div id=\"collapse$contor\" class=\"panel-collapse collapse\">");
    
      echo("<div class=\"panel-body\">");
      echo("Procesor: $row[2]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Memorie RAM: $row[3]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Capacitate stocare: $row[4]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Tip stocare: $row[5]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Placa video: $row[6]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Software: $row[7]");
      echo("</div>");

      echo("<div class=\"panel-body\">");
      echo("Memorie video: $row[8]");
      echo("</div>");
      $nume_buton="$row[9]";
  
      echo("<form method=\"POST\" action=\"buton.php\">");
      echo("<button type=\"submit\" class=\"btn btn-default\" name=\"$row[9]\">Comanda</button>");
      echo("</form>");

    echo("</div>");
    $contor=$contor+1;
      }

       ?>
      
    </div>
</div>
    
</body>
</html>