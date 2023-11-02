 <?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: log.php");
    exit;
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
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=M+PLUS+1p:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a href="" class="logo"><p style="font-weight: lighter;">Art</p><p style="font-weight: bolder;">    STUDIO</p>
        </a>
        <div class="nav">
            <ul>
                <li><a href="home.php" style="color: rgb(17, 161, 113);font-weight:bolder;">Home</a></li>
                <li><a href="explore.php">Explore</a></li>
                <li><a href="">Exhibition</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">contact us</a></li>
                <div class="nav1"><a href="" style="
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 1px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;">Validate ART</a></div>
            </ul>
        </div>
        <div class="profile" >
            <img src="./icons/profile.png" >
            <p>menu</p>
        </div>
    </header>
    <div class="wrapper" style="font-size: 12px;
    text-decoration: none;
    color: rgb(240, 240, 240);
    font-family: 'Kanit', sans-serif;" >
			<div class="center">
			<h1 style="
    color: white;
    font-size: 70px;
    font-weight: bold;
    padding-top:60px;
    text-align: center;">Welcome To  ArtSTUDIO</h1>
			<div class="buttons">
			<a href="explore.php"><button>Explore More</button></a>
			<a href="contactus.html"><button class="btn2">Contact Us</button></a>
		</div>
		</div>
</div>
    <footer>
        <p class="foot">copyright &copy artSTUDIO- allrights reserved</p>
    </footer>
</body>
</html>