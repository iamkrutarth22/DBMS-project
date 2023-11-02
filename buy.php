<?php
$insert=false;
if(isset($_GET['AID']))
{
    $n=10;
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}
 
$string_token=getName($n);




    include 'connect.php';
    $BID=$_GET['AID'];
    $sql ="INSERT INTO `buys` (`date`, `status`, `string`, `AID`, `UID`) VALUES (current_timestamp(), 'sold', '$string_token', '$BID', '4')";
    $sql2="UPDATE `artwork` SET `status` = 'sold' WHERE `artwork`.`AID` = $BID;";

    if($con->query($sql) && $con->query($sql2)){
        $insert=true;
        header("location:explore.php");
    }
    else{
        echo "ERROR: $sql <br> 
        $con->error";
    }
    $con->close();
}
?>