<?php 

session_start();

$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);


if(isset($_POST['username'])){
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select User,Parola from angajati where User='".$username."'AND Parola='".$password."' ";
    $functie="select Functie, ID_departament from angajati where User='".$username."' ";
    
    
    $result=mysqli_query($con,$sql);
    $result2=mysqli_query($con,$functie);
    $valoare=mysqli_fetch_row($result2);
    
    if(mysqli_num_rows($result)==1){
        $_SESSION['login_user'] = $username;
        if($valoare[0]=='M')
        {
            header('Location:cont_manager.php');
            exit();
        }
        else{
           if($valoare[1]==2)
                header('Location: cont_curier.php');
            else
                header('Location: cont_angajat.php');
        }
    }
    else{
        $_SESSION['eroare_logare']="User sau parola incorecta";
        header('Location: login_angajat_base.php');
        exit();
    }
        
}
?>