<?php
$login=false;
$passError=false;
$userError=false;
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `user` WHERE username='$username'";
    $result = mysqli_query($con, $sql);
   
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
        if (password_verify($password, $row['password']) )
        { 
              $login = true;
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['username'] = $username;
              $_SESSION['UID']=$row['UID'];
              if($username == "admin" ){
                    header('location:admin.php');
              }
              else{
                    header('location:home.php');
              }
          } 
          else{
              $passError = true;
          }
      }
    } 
    else{
        $userError =true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=M+PLUS+1p:wght@500&display=swap" rel="stylesheet">
</head>
    
    <title>Document</title>
</head>
<body>
    <header>
        <a href="" class="logo">
            <p style="font-weight: lighter;">Art</p>
            <p style="font-weight: bolder;">    STUDIO</p>
        </a>
        <div class="nav"style="visibility:hidden;">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Explore</a></li>
                <li><a href="">Exhibition</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">contact us</a></li>
            </ul>
        </div>
        <div class="profile" style="visibility:hidden;">
            <img src="./icons/profile.png" >
            <p>menu</p>
        </div>
    </header>
    <?php
      if($login == true){
        echo" <span style='color:white;'>logged in</span>";
      }
      if($passError == true){
        echo" <span style='color:white;''>*incorrect password</span>";
      }
      if($userError == true){
        echo" <span style='color:white;''>*username does not exits</span>";
      }
    ?>
    <div class="container" >
        <img src="./icons/luca-nicoletti-O8CHmj0zgAg-unsplash.jpg" alt="">
        <form action=" " method="post">
            <h2 id="su">Welcome to ArtStudio</h2>
            <p style="background: none;">enter your details</p>
            <br>
            <label for="username">username</label>
            <input type="text" name="username" required>
            <br>

            <label for="password">password</label>
            <input type="password" name="password" placeholder="password" required>
            <br>

            <input type="submit" name="submit" value="log in" id="btn">
            <br>
            <p style="background: none;">does not have an account? <a href="signup.php"> signup</a></p>
        </form>
    </div>
    <footer>
        <p class="foot">copyright &copy krutarthhaldankar@gamil.com- allrights reserved</p>
    </footer>
</body>
</html>