<?php

session_start();
  if(!isset($_SESSION['login_user']))
  {
    header('Location: login_angajat_base.php');
  }

$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

$interogare="select MAX(Cod_comanda) from `clienti_produse`";//salvez cea mai mare valoare a codului de comanda
$result_query=mysqli_query($con,$interogare);
$rasp=mysqli_fetch_row($result_query);

//verific ce buton sa apasat
for($i=1;$i<=$rasp[0];$i++){
if(isset($_POST[$i])){
    $id_comanda=$i;
    $sql="UPDATE `clienti_produse` SET `Status`=\"Livrat\" where `clienti_produse`.`Cod_comanda`=$id_comanda";//actualizez status-ul livrarii
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_b_livrare']="Livrare confirmata!!!";
    } else {
        $_SESSION['response_b_livrare']="Eroare!!!";
    }
}
}
header('Location: comenzi.php');//redirect catre pagina in care se afla comenzile pe care curierul le are de livrat

?>