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
 
  $nr_inmatriculare=$_POST['nr_inmatriculare'];
  $sql2=mysqli_query($con,"UPDATE angajati SET ID_masina=NULL where ID_masina=(select M.ID_masina from `masini_livrare` M where M.NR_inmatriculare='".$nr_inmatriculare."')");
  $sql="delete from `masini_livrare` where Nr_inmatriculare='".$nr_inmatriculare."'";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_sm']="Masina eliminata cu succes";
    } else {
        $_SESSION['response_sm']="Eroare";
    }
    if($row1[0]=="2")
        header('Location: panou_admin_c.php');
    if($row1[0]=="1")
        header('Location: Panou Administrator.php');

}

?>