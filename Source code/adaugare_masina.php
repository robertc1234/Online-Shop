<?php
session_start();
  if(!isset($_SESSION['login_user']))//verific daca managerul este conectat, in caz contrar, il trimit la pagina de logare
  {
    header('Location: login_angajat_base.php');
  }
  ?>

<?php 
//daca userul este conectat, fac conexiunea cu baza de date
if(isset($_SESSION['login_user'])){
$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);
    //salvez informatiile
    $marca=$_POST['masina'];
    $nr_inmatriculare=$_POST['nr_inmatriculare'];
    $man=$_SESSION['login_user'];
    $qq1=mysqli_query($con,"select ID_departament from departamente D where D.ID_manager=(select A.ID_angajat from angajati A where A.User='".$man."') ");
    $row1=mysqli_fetch_row($qq1);
 
    //interogare prin care voi insera masinile responsabile de livrarea produselor
    $sql="INSERT INTO `Masini_livrare` (`Marca_masina`, `Nr_inmatriculare`) VALUES ('".$marca."','".$nr_inmatriculare."')";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_am']="Masina inserata cu succes";
    } else {
        $_SESSION['response_am']="Eroare";
    }
    if($row1[0]=="2")
        header('Location: panou_admin_c.php');
    if($row1[0]=="1")
        header('Location: Panou Administrator.php');  

}
        
?>