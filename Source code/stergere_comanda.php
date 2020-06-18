<?php

session_start();
  if(!isset($_SESSION['login_client']))
  {
    header('Location: login_clienti_base.php');
  }
?>

<?php
if(isset($_SESSION['login_client'])){

$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

$interogare="select MAX(Cod_comanda) from `clienti_produse`";
$result_query=mysqli_query($con,$interogare);
$rasp=mysqli_fetch_row($result_query);
for($i=1;$i<=$rasp[0];$i++){
if(isset($_POST[$i])){
    $id_comanda=$i;
    $qq=mysqli_query($con,"select P.Stoc, CP.Status, P.ID_produs from produse P join `clienti_produse` CP on CP.ID_produs=P.ID_produs where CP.Cod_comanda=$id_comanda");
    $roww=mysqli_fetch_array($qq);
    $sql="delete from `clienti_produse` where Cod_comanda=$id_comanda";
    if($roww[1]=="validat"){
      $stoc_new=$roww[0]+1;
      $up=mysqli_query($con,"UPDATE produse SET Stoc=$stoc_new where ID_produs=$roww[2]");

    }
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_ic']="Comanda a fost stearsa";
    } else {
        $_SESSION['response_ic']="Eroare";
    }
}
}
header('Location: istoric_comenzi.php');
}

?>