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

    $id_comanda=$_POST['id_comanda'];
    $id_angajat=$_POST['id_angajat'];
    $status=$_POST['status'];
    $man=$_SESSION['login_user'];
    $qq1=mysqli_query($con,"select ID_departament from departamente D where D.ID_manager=(select A.ID_angajat from angajati A where A.User='".$man."') ");
    $row1=mysqli_fetch_row($qq1);
 
    $sql="UPDATE `clienti_produse` SET `ID_angajat`='".$id_angajat."', `Status`='".$status."' where `clienti_produse`.`Cod_comanda`='".$id_comanda."' ";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_gc']="Comanda gestionata cu succes";
    } else {
        $_SESSION['response_gc']="Eroare";
    }
    if($row1[0]=="2")
        header('Location: panou_admin_c.php');
    if($row1[0]=="1")
        header('Location: Panou Administrator.php');  
 
  }

?>