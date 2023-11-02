<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        option{
            background-color:black;
            color :white;
        }
    </style>
</head>
<body>
    
<?php
include("connect.php");
?>
<form action="test.php" method="post">
<select name="artist">
    <option value="">Select artist</option>
    <?php
    include 'connect.php';
    $sql1="SELECT * FROM `artist_info`;";
    echo "<p>eubibb</p>";
    $result = mysqli_query($con, $sql1);
    // Check for the database creation success
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $artist=$row['name'];
            echo "<p>eubibb</p>";
            $artist_id=$row['artist_id'];
            echo"<option value='$artist_id' >$artist</option>";
        }
    }
    // foreach($artist as $value){
        // }
        ?>
</select>
<input type="submit" name="submit">
</form>
</body>
</html>
        <?php
            if(isset($_POST['artist'])){
                $artist_id=$_POST['artist'];
                $sql3="SELECT name FROM `artist_info` WHERE artist_id='$artist_id';";
                $result3=mysqli_query($con,$sql3);
                if($result3){
                    while($name=mysqli_fetch_assoc($result3)){
                        $artist=$name['name'];
                        echo"<h1 style='text-transform:uppercase;'>ARTTIST -$artist</h1> ";
                    }
                }
            }
        ?>