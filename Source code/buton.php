<?php

session_start();
  if(!isset($_SESSION['login_client']))
  {
    header('Location: login_clienti_base.php');
  }
?>

<?php
if(isset($_SESSION['login_client'])){
$username=$_SESSION['login_client'];

$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

$interogare2="select id_client from clienti where User='".$username."'";
$result_query2=mysqli_query($con,$interogare2);
$rasp2=mysqli_fetch_row($result_query2);

$interogare="select MAX(ID_produs) from produse";
$result_query=mysqli_query($con,$interogare);
$rasp=mysqli_fetch_row($result_query);
for($i=1;$i<=$rasp[0];$i++){
if(isset($_POST[$i])){
    $id_produs=$i;
    $q1=mysqli_query($con,"select Stoc from produse where ID_produs=$id_produs");
    $roww=mysqli_fetch_array($q1);
  if($roww[0]>0){
    $date = date("Y-m-d", strtotime("now")); 
    $new_stoc=$roww[0]-1;
    $sql="INSERT INTO `clienti_produse` (`ID_client`,`ID_produs`,`Data_comenzii`,`Status`) VALUES ('".$rasp2[0]."','".$id_produs."','".$date."',0)";
    $q=mysqli_query($con,"UPDATE produse SET Stoc=$new_stoc where ID_produs=$id_produs");
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_buton']="Comanda dumneavoastra a fost inregistrata. Va rugam sa asteptati validarea comenzii!!!";
    } else {
        $_SESSION['response_buton']="Eroare!!!";
    }
  }
  else{  
    $_SESSION['response_buton']="Produsul nu mai este in stoc!!!";
  }

    header('Location: produse.php');
}
}

}

?>