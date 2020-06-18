<?php
session_start();
  if(!isset($_SESSION['login_user']))
  {
    header('Location: login_angajat_base.php');
  }
  ?>

<?php 
if(isset($_SESSION['login_user'])){
$host="localhost";
$user="root";
$password="";
$db="proiect bd";
 
$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

if(isset($_POST['email'])){

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
    $id_dep=$_POST['departament'];
    $functie=$_POST['functie'];
    
    $sql="select * from angajati where user='".$username."' ";
    
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>=1){
        echo " Already Exist!";
        exit();
    }
        else{
            $qq=mysqli_query($con,"select ID_manager from departamente where ID_departament=$id_dep");
            $row=mysqli_fetch_row($qq);
            session_start();
            $man=$_SESSION['login_user'];
            $qq1=mysqli_query($con,"select ID_departament from departamente D where D.ID_manager=(select A.ID_angajat from angajati A where A.User='".$man."') ");
            $row1=mysqli_fetch_row($qq1);
            if(($functie=="M" && $row[0]==null) || $functie=="A"){
                 $sql="INSERT INTO `angajati` ( `Nume`,`Prenume`,`CNP`,`SEX`,`Data_nasterii`,`Strada`,`Nr`,`Oras`,`Judet`,`ID_departament`,`User`,`Parola`,`Nr_telefon`,`email`,`functie`) VALUES ('".$nume."','".$prenume."','".$CNP."','".$sex."','".$data_n."','".$strada."','".$nr."','".$oras."','".$judet."','".$id_dep."','".$username."','".$password."','".$nr_tel."','".$email."','".$functie."')";
                 
                if ($con->query($sql) === TRUE) {
                    $_SESSION['response']="Angajat inserat cu succes";
                   
                } else {
                    $_SESSION['response']="eroare";
                }

            }
            else
                $_SESSION['response']="In acest departament exista deja un manager";

            if($row1[0]=="3")
                header('Location: panou_admin_hr.php');
            if($row1[0]=="1")
                header('Location: Panou Administrator.php');
        
    }
        
}
}
?>