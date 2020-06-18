<?php
 session_start();
 $user=$_SESSION['login_client'];

 if(!isset($user))
 {
   header('Location: login_clienti_base.php');
 }

 ?>

<?php 
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

    $user_client=$_SESSION['login_client'];

     $sql="UPDATE `clienti` SET `Strada`='".$new_strada."', `Nr`='".$new_nr."',`Oras`='".$new_oras."',`Judet`='".$new_judet."' where `clienti`.`User`='".$user_client."' ";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_eac']="Adresa modificata cu succes!!!";
    } else {
        $_SESSION['response_eac']="Eroare!!!";
    }
    header('Location: profil_client.php');
        
?>