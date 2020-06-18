<?php

session_start();
  if(!isset($_SESSION['login_user']))
  {
    header('Location: login_angajat_base.php');
  }
?>

<?php
if(isset($_SESSION['login_user'])){

$host="localhost";
$user="root";
$password="";
$db="proiect bd";

$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

$man=$_SESSION['login_user'];
$qq1=mysqli_query($con,"select ID_departament from departamente D where D.ID_manager=(select A.ID_angajat from angajati A where A.User='".$man."') ");
$row1=mysqli_fetch_row($qq1);
 
  $id_spec=$_POST['id_specificatie'];
  
  $sql="delete from `specificatii tehnice` where ID_specificatii=$id_spec";
    
    if ($con->query($sql) === TRUE) {
      $_SESSION['response_ss']="Set de specificatii sters cu succes";
    } else {
        $_SESSION['response_ss']="Eroare";
    }
    if($row1[0]=="4")
        header('Location: panou_admin_ps.php');
    if($row1[0]=="1")
        header('Location: Panou Administrator.php');

}

?>