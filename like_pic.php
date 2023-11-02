<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: log.php");
    exit;
}
include 'connect.php';
$UID=$_SESSION['UID'];
$sql="SELECT * FROM `user` WHERE UID='$UID';";
$resultU = mysqli_query($con, $sql);
if($resultU){
    while($row1 = mysqli_fetch_assoc($resultU)){
        $img0=$row1['photo'];
        $n=$row1['username'];
    }
}
if(isset($_GET['AID'])){
    $AID=$_GET['AID'];
}

$forlike="SELECT * FROM `liked` WHERE UID='$UID' AND AID='$AID';";
$like_result = mysqli_query($con,$forlike);
$num = mysqli_num_rows($like_result);
if($num == 1){
    $like='./icons/liked_painting.png';
}
else{
    $like='./icons/not_like.png';
}

if( $like=='./icons/not_like.png'){
    $sql2="INSERT INTO `liked` (`AID`, `UID`) VALUES ('$AID', '$UID');";
    mysqli_query($con, $sql2);
}
else if( $like=='./icons/liked_painting.png'){
    $sql3="DELETE FROM `liked` WHERE `liked`.`AID` =$AID AND `liked`.`UID` = $UID;";
    mysqli_query($con, $sql3);
}
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?> 
