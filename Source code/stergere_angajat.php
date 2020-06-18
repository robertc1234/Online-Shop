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
  $user_angajat=$_POST['user_angajat'];
  $qq1=mysqli_query($con,"select D.ID_departament, (select A.Functie from angajati A where User='".$user_angajat."') from departamente D where D.ID_manager=(select A.ID_angajat from angajati A where A.User='".$man."') ");
  $row1=mysqli_fetch_row($qq1);

  if($row1[1]=='M'){

      if($row1[0]=="1"){
        $sql2=mysqli_query($con,"UPDATE departamente SET ID_manager=NULL where ID_manager=(select A.ID_angajat from Angajati A where A.User='".$user_angajat."')");
        $sql="delete from `angajati` where `angajati`.`User`='".$user_angajat."'";
        
        if ($con->query($sql) === TRUE) {
            $_SESSION['response_s']="Stergere efectuata cu succes";
        } else {
            $_SESSION['response_s']="Eroare";
        }
        header('Location: Panou Administrator.php');
      }
      else{
        $_SESSION['response_s']="Nu puteti sterge un manager";
        header('Location: panou_admin_hr.php');
      }

  }

  else{
  
  $sql="delete from `angajati` where `angajati`.`User`='".$user_angajat."'";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_s']="Stergere efectuata cu succes";
    } else {
        $_SESSION['response_s']="Eroare";
    }
    if($row1[0]=="3")
      header('Location: panou_admin_hr.php');
    if($row1[0]=="1")
      header('Location: Panou Administrator.php');
  }

}

?>