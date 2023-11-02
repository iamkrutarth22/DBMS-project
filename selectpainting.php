<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: log.php");
    exit;
}
include 'connect.php';
$s=$_SESSION['UID'];
$sql="SELECT * FROM `user` WHERE UID='$s';";
$resultU = mysqli_query($con, $sql);
if($resultU){
    while($row1 = mysqli_fetch_assoc($resultU)){
        $img0=$row1['photo'];
        $n=$row1['username'];
    }
}
$x=$_SESSION['username'];
echo "<br>".$x;
if(isset($_GET['AID'])){
    $Y=$_GET['AID'];
}
echo "<br>".$Y;
?> 
