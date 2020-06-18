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
 
  $u=$_POST['usern'];
  $fct=$_POST['fct'];
  $dep=$_POST['dep'];

  if($fct=='M'){
    $sql1=mysqli_query($con,"UPDATE angajati SET Functie='A' where ID_angajat=(select D.ID_manager from departamente D where D.ID_departament='".$dep."')");
    $sql2=mysqli_query($con,"UPDATE departamente SET ID_manager=(select A.ID_angajat from angajati A where User='".$u."') where ID_departament='".$dep."' ");

  }
  if($fct=='A'){
    $sql3=mysqli_query($con,"select Functie, ID_departament from angajati where User='".$u."'");
    $row_a=mysqli_fetch_row($sql3);
    if($row_a[0]=="M"){
        $sql4=mysqli_query($con,"UPDATE departamente SET ID_manager=NULL where ID_departament='".$row_a[1]."'");
    }

  }
  $sql5="UPDATE angajati SET Functie='".$fct."',ID_departament='".$dep."' where User='".$u."'";
    
    if ($con->query($sql5) === TRUE) {
        $_SESSION['response_ua']="Update facut cu succes";
    } else {
        $_SESSION['response_ua']="Eroare". $sql . "<br>" . $con->error;
    }
    if($row1[0]=="1")
        header('Location: Panou Administrator.php');

}

?>