<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='artstudio';
// $db_port = "3306";
$con=mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
if(!$con){
    die(mysqli_error($con));
}
?>