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
    
    $sql="select User,Parola from clienti where User='".$username."'AND Parola='".$password."' ";
    
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1){
        $_SESSION['login_client'] = $username;
        header('Location: cont_client.php');
        exit();
    }
    else{
        $_SESSION['er_log_client']="Eroare";
        header('Location: login_clienti_base.php');
        exit();
    }
        
}
?>