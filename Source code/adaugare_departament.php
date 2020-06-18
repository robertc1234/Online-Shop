<?php
session_start();
  if(!isset($_SESSION['login_user']))
  {
    header('Location: login_angajat_base.php');
  }
  ?>

<?php 
//stabilesc conexiunea cu baza de date
if(isset($_SESSION['login_user'])){
$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

    $departament=$_POST['departament'];
    $cod=$_POST['cod'];
    $id_manager=$_POST['id_manager'];
   
 
    
    $sql="INSERT INTO `Departamente` (`Nume`, `Cod`,`ID_Manager`) VALUES ('".$departament."','".$cod."','".$id_manager."')";
    session_start();
    if ($con->query($sql) === TRUE) {
        //daca inserarea unui nou departament sa facut cu succes afisez un mesaj corespunzator
        $_SESSION['new_dep']="New record created successfully";
    } else {
        
        $_SESSION['new_dep']="Eroare";
    }
    header('Location: Panou Administrator.php');
}
        
?>