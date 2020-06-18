<?php
 session_start();
 $user_angajat=$_SESSION['login_user'];

 if(!isset($user_angajat))
 {
   header('Location: login_angajat_base.php');
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

    $cerere="select A.ID_angajat from angajati A where User='".$user_angajat."'";
    $result2=mysqli_query($con,$cerere);
    $id_client=mysqli_fetch_row($result2);

    $interogare="select * from angajati where user='".$new_user."' ";
    
    $result=mysqli_query($con,$interogare);
    //daca gasesc in baza de date un cont al carui user este identic cu cel existent afisez mesajul corespunzator si dau redirect catre pagina de inregistrare
    if(mysqli_num_rows($result)>=1){
        $_SESSION['response_eda']="Already Exist!";
        exit();
    }
        else{

            $sql="UPDATE `angajati` SET `User`='".$new_user."', `Parola`='".$new_pass."',`Nr_telefon`='".$new_nr_tel."' where `angajati`.`User`='".$user_angajat."' ";
    
            if ($con->query($sql) === TRUE) {
                 $_SESSION['response_eda']="Date modificate cu succes";
            } else {
                $_SESSION['response_eda']="Eroare";
        }

        header('Location: profil_angajat.php');

    }

    
        
?>