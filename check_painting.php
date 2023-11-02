<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {

            $token=$_POST['searchtoken'];
            if($token=="" || $token==null)
            {
                    $username=' ';
                    $date=' ';
                    $Aname=' ';
                    $description=' ';
                    $price=' ';
                    $picture=' ';
            }
            $sql="SELECT * from buys join artwork on buys.AID = artwork.AID join user on buys.UID=user.UID where string='$token'";
            $result=mysqli_query($con,$sql);
            $num_rows=mysqli_num_rows ( $result );
            $valid=0;
            if($num_rows!=0)
            {
            while($row = mysqli_fetch_array($result))
            {
               $username=$row['username'];
               $date=$row['date'];
               $Aname=$row['Aname'];
               $description=$row['description'];
               $price=$row['price'];
               $picture=$row['picture'];
            }
            }
            else
            {
                echo 'Invalid Token!.';
                $username=' ';
                $date=' ';
                $Aname=' ';
                $description=' ';
                $price=' ';
                $picture=' '; 

            }
        }
        else
        {
            $username=' ';
            $date=' ';
            $Aname=' ';
            $description=' ';
            $price=' ';
            $picture=' '; 
        }

    

?>
<p style="
    font-family: auto;
    color: aliceblue;
    font-size: 30px;
    margin-top: -143px;
    ">ArtSTUDIO </p>
<center><p style="
    font-family: fantasy;
    color: aliceblue;
    font-weight: 100px;
    font-size: 115px;
    margin: 40px;
    "
    >validate your ART </p></center>
<body style="
    background: black;    padding-top: 150px;">
    
    <form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
    <center> <input type="text" placeholder="Enter token"  name="searchtoken" id="input-search"
    style="width: 36%;
    padding: 20px 30px;
    margin: 24px 0;
    box-sizing: border-box;"></center>
       <center> <input type="submit" value="Search" name="searchbox" 
    style="background-color: #04AA6D;
    border: none;
    color: white;
    padding: 23px 48px;
    text-decoration: none;
    margin: 13px 2px;
    cursor: pointer;"></center>
        </form>
    
    <?php

            echo $username.'</br>';
            echo $date.'</br>';
            echo $Aname.'</br>';
            echo $description.'</br>';
            echo $price.'</br>';
            echo '<img src="'.$picture.'">';
         

    ?>
</body>
</html>