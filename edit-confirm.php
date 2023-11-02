<?php

$host = "localhost";  
$user = "root";  
$password = '';
$db_name = "artstudio";  
  
$conn = mysqli_connect($host, $user, $password, $db_name); 
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}

$showAlert = false;

$AID = $_POST['AID'];
echo $AID;

$change = $_POST['change'];
$change_value = $_POST['change_value'];
echo $change_value;
echo $change;
if($change=="status"){
  echo "hi one";
    $sql = "UPDATE artwork set status = '$change_value' where AID = '$AID'";
    
  }

if($change=="price"){
  echo "hi two";
    $sql = "UPDATE artwork set price = '$change_value' where AID = '$AID'";
    
  }
  
  $result = mysqli_query($conn,$sql);
  // $update = mysqli_query($conn,$sql1);

  if($result){
    $showAlert = true;
  }
  if($showAlert){
    
    
    // echo '<script>alert("Successfully edited the data")</script>';
    // header('Refresh:1; admin-members.php');
  }
  else{
    echo 'Sorry some error occured';
  }


  $conn->close();

?>