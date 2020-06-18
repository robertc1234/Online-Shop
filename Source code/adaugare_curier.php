<?php
session_start();
  if(!isset($_SESSION['login_user']))
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

if(isset($_POST['email'])){
    //salvez informatiile in variabile
    $nume=$_POST['nume'];
    $prenume=$_POST['prenume'];
    $CNP=$_POST['cnp'];
    $nr_tel=$_POST['nr_tel'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $data_n=$_POST['data_n'];
    $strada=$_POST['strada'];
    $nr=$_POST['nr'];
    $oras=$_POST['oras'];
    $judet=$_POST['judet'];
    $functie=$_POST['functie'];
    $id_masina=$_POST['id_masina'];
    
    $man=$_SESSION['login_user'];
    $qq1=mysqli_query($con,"select ID_departament from departamente D where D.ID_manager=(select A.ID_angajat from angajati A where A.User='".$man."') ");
    $row1=mysqli_fetch_row($qq1);//extrag id-ul departamentului din care face parte managerul care este logat la un moment dat

    $sql="select * from angajati where user='".$username."' ";
    
    $result=mysqli_query($con,$sql);
    if($functie=='M' && $row1[0]=='2' ){

        $_SESSION['response_ac']="Nu puteti adauga manageri!";
        header('Location: panou_admin_c.php');

    }
    else{
    if(mysqli_num_rows($result)>=1){

        $_SESSION['response_ac']="Already Exist!";
        if($row1[0]=="2")
            header('Location: panou_admin_c.php');
        if($row1[0]=="1")
            header('Location: Panou Administrator.php'); 
        exit();
    }
        else{
 
    $sql="INSERT INTO `angajati` ( `Nume`,`Prenume`,`CNP`,`SEX`,`Data_nasterii`,`Strada`,`Nr`,`Oras`,`Judet`,`ID_departament`,`User`,`Parola`,`Nr_telefon`,`email`,`functie`,`id_masina`) VALUES ('".$nume."','".$prenume."','".$CNP."','".$sex."','".$data_n."','".$strada."','".$nr."','".$oras."','".$judet."',2,'".$username."','".$password."','".$nr_tel."','".$email."','".$functie."','".$id_masina."')";
    
    if ($con->query($sql) === TRUE) {
        //daca interogarea a fost facuta cu succes, salvez mesajul intr-o variabila de tip SESSION
        $_SESSION['response_ac']="Curier inserat cu succes";
    } else {
        $_SESSION['response_ac']="Eroare";
    }
    if($row1[0]=="2")//$row1[0] contine id-ul departamentului managerului logat, in functie de care o sa fac redirect
        header('Location: panou_admin_c.php');
    if($row1[0]=="1")
        header('Location: Panou Administrator.php');  
    }
        
}
}
?>