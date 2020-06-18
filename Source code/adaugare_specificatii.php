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

    $cpu=$_POST['procesor'];
    $ram=$_POST['ram'];
    $cap_stoc=$_POST['cap_stoc'];
    $tip_stoc=$_POST['tip_stoc'];
    $placa_video=$_POST['placa_video'];
    $soft=$_POST['soft'];
    $mem_vid=$_POST['mem_vid'];

    $man=$_SESSION['login_user'];
    $qq1=mysqli_query($con,"select ID_departament from departamente D where D.ID_manager=(select A.ID_angajat from angajati A where A.User='".$man."') ");
    $row1=mysqli_fetch_row($qq1);
    
    $sql="INSERT INTO `specificatii tehnice` (`ID_specificatii`, `Procesor`,`RAM`,`Cap_stocare`,`Tip_stocare`,`Placa_video`,`Software`,`Memorie_video`) VALUES (NULL,'".$cpu."','".$ram."','".$cap_stoc."','".$tip_stoc."','".$placa_video."','".$soft."','".$mem_vid."')";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['response_as']="Set de specificatii inserat cu succes";
    } else {
        $_SESSION['response_as']="Eroare";
    }
    if($row1[0]=="4")
        header('Location: panou_admin_ps.php');
    if($row1[0]=="1")
        header('Location: Panou Administrator.php');

  }

?>