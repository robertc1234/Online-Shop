<?php
 session_start();
 $user_angajat=$_SESSION['login_user'];

 if(!isset($user_angajat))
 {
   header('Location: login_angajat_base.php');
 }

 ?>

<?php 
if(isset($user_angajat)){
$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

    $new_strada=$_POST['strada'];
    $new_nr=$_POST['nr'];
    $new_oras=$_POST['oras'];
    $new_judet=$_POST['judet'];

     $sql="UPDATE `angajati` SET `Strada`='".$new_strada."', `Nr`='".$new_nr."',`Oras`='".$new_oras."',`Judet`='".$new_judet."' where `angajati`.`User`='".$user_angajat."' ";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_eaa']="Adresa modificata cu succes!!!";
    } else {
        $_SESSION['response_eaa']="Eroare!!!";
    }
    header('Location: profil_angajat.php');
}   
?>