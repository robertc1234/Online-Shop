<?php 
 
$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

 
if(isset($_POST['username'])){
    
    $nume=$_POST['nume'];
    $prenume=$_POST['prenume'];
    $CNP=$_POST['cnp'];
    $nr_tel=$_POST['nr_tel'];
    $username=$_POST['username'];
    $password=$_POST['parola'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $data_nastere=$_POST['data_nastere'];
    $strada=$_POST['strada'];
    $nr=$_POST['nr'];
    $oras=$_POST['oras'];
    $judet=$_POST['judet'];

    session_start();

    if($nume==null || $prenume==null || $nr_tel==null || $username==null || $password==null || $email==null || $data_nastere==null || $strada==null || $nr==null || $oras==null || $judet==null ){
    
        $_SESSION['incomplet']="Trebuie sa completati toate casutele";
        header('Location: register_base.php');
        exit();

    }
    else{
    $sql="select * from clienti where user='".$username."' ";
    
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>=1){
        $_SESSION['register_client']="Already Exist!!!";
        header('Location: register_base.php');
        exit();
    }
        else{
 
    
    $sql="INSERT INTO `clienti` (`Nume`,`Prenume`,`CNP`,`Nr_telefon`,`User`, `Parola`,`email`,`SEX`,`Data_nastere`,`Strada`,`Nr`,`Oras`,`Judet`) VALUES ('".$nume."','".$prenume."','".$CNP."','".$nr_tel."', '".$username."', '".$password."','".$email."','".$sex."','".$data_nastere."','".$strada."','".$nr."','".$oras."','".$judet."')";
    if ($con->query($sql) === TRUE) {
        $_SESSION['register_client']="New record created successfully!!!";
    } else {
        $_SESSION['register_client']="Eroare!!!";
    }
    header('Location: register_base.php');

    }
        
}
}
?>