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
    function likebutton($like,$AID,$UID){
        // $forlike2="SELECT * FROM `liked` WHERE UID='$UID' AND AID='$AID';";
        // $like_result2 = mysqli_query($con,$forlike2);
        // $num = mysqli_num_rows($like_result2);
        include 'connect.php';
        if( $like=='./icons/not_like.png'){
            $like='./icons/liked_painting.png';
            $sql2="INSERT INTO `liked` (`AID`, `UID`) VALUES ('$AID', '$UID');";
            mysqli_query($con, $sql2);
        }
        else{
            $like='./icons/not_like.png';
            $sql3="DELETE FROM `liked` WHERE `liked`.`AID` =$AID AND `liked`.`UID` = $UID;";
            mysqli_query($con, $sql3);
        }
        return $like;
    
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>artstudio/home</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/explore.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=M+PLUS+1p:wght@500&display=swap" rel="stylesheet">
        <script src="./javascript/explore.js"></script>
    </head>
<body>
     <header>
        <a href="" class="logo"><p style="font-weight: lighter;">Art</p><p style="font-weight: bolder;">    STUDIO</p></a>
        <div class="nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="explore.php"style="color: rgb(17, 161, 113);font-weight:bolder;">Explore</a></li>
                <li><a href="">Exhibition</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">contact us</a></li>
            </ul>
        </div>
        <div class="profile" >
            <?php
            echo"
            <img src='$img0' >
            <p>$n</p>";
            ?>
        </div>
    </header>
    <div class="container">
        <?php
            $sql1="SELECT * FROM artwork JOIN belongs_to on artwork.AID=belongs_to.AID JOIN artist_info on artist_info.artist_id=belongs_to.artist_id WHERE status='not sold';";
            $result = mysqli_query($con, $sql1);
            
            // Check for the database creation success
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $title=$row['Aname'];
                    $AID=$row['AID'];
                    $price=$row['price'];
                    $img=$row['picture'];
                    $artist=$row['name'];
                    $artistID=$row['artist_id'];
                    
                    $forlike="SELECT * FROM `liked` WHERE UID='$UID' AND AID='$AID';";
                    $like_result = mysqli_query($con,$forlike);
                    $num = mysqli_num_rows($like_result);
                    if($num == 1){
                        $like='./icons/liked_painting.png';
                    }
                    else{
                        $like='./icons/not_like.png';
                    }

                    echo"
                    <div class='box'>
                    <a href='selectpainting.php?AID=$AID'><img src='$img'></a>
                    <br>
                    <span style='font-weight:bolder;font-family:serif;font-size:x-large; text-transform: uppercase; '>$title</span><br>
                    <span style='color:  rgba(255, 255, 255, 0.432);'> BY </span><span style='font-weight: 900;text-transform: uppercase;color:  rgb(255, 250, 238);'>$artist</span>
                    <a href='like_pic.php?AID=$AID'><img src='$like' id='like'></a>
                    </div>
                ";
                //   <img src='$like'id='like'> 
            }
        }
        ?>
    </div>
    <footer>
        <p class="foot">copyright &copy krutarthhaldankar@gamil.com- allrights reserved</p>
    </footer>
</body>
</html>