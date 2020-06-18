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

    $new_user=$_POST['user'];
    $new_pass=$_POST['parola'];
    $new_nr_tel=$_POST['nr_telefon'];

    $user_client=$_SESSION['login_client'];
    $cerere="select C.ID_client from clienti C where User='".$user_client."'";
    $result2=mysqli_query($con,$cerere);
    $id_client=mysqli_fetch_row($result2);

    $interogare="select * from clienti where user='".$new_user."' ";
    
    $result=mysqli_query($con,$interogare);
    // verific daca noul user nu exista deja
    if(mysqli_num_rows($result)>=1){
        $_SESSION['response_edc']="Already Exist!!!";
        header('Location:profil_client.php');
        exit();
    }
    //daca noul user-name este unic fac update in baza de date
        else{

            $sql="UPDATE `clienti` SET `User`='".$new_user."', `Parola`='".$new_pass."',`Nr_telefon`='".$new_nr_tel."' where `clienti`.`ID_client`='".$id_client[0]."' ";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_edc']="Date modificate cu succes!!!";
    } else {
        $_SESSION['response_eaa']="Eroare!!!";
    }
    header('Location:profil_client.php');
    }

    
        
?>