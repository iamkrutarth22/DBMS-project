<?php
$insert=false;

$wrongpass=false;
$wronguser=false;
$wrongemail=false;
if(isset($_POST['username']) && isset($_POST['submit']) )
{
    include 'connect.php';
    if(isset($_FILES['my_image'])){
            $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];
            if ($error === 0) {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png"); 

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path =$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }else {
                        $em = "You can't upload files of this type";
                        header("Location: signup.php?error=$em");
                    }	
            }
            else{
                $em = "unknown error occurred!";
                header("Location: signup.php?error=$em");
            }
    }
    else{
        $img_upload_path='profile.png';
        
    }
    $username = $_POST['username'];
    $email =$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    if($password==$cpassword){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $wrongemail=true;
            // header('location:signup.php');
        }
        else{ 
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql1="SELECT * FROM `user`";
            $result = mysqli_query($con, $sql1);
            $check=false;
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $user2 = $row['username'];
                    if($user2 ==$username){
                        $check=true;
                    }
                }
            }
            if($check == true){
                $wronguser=true;
            }
            else{
                $sql ="INSERT INTO `user` (`username`,`email`, `password`, `photo`,`UID`) VALUES ('$username', '$email','$hash', '$img_upload_path',NULL)";
                if($con->query($sql)){
                        $insert=true;
                        echo"inserted into database";
                        $con->close();
                        header("location: log.php");
                }
            }
        }

    }
    else{
        $wrongpass=true;
        // header('location:signup.php');
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
                     
                    if($wronguser == true){
                        echo "<span id='formerror1'>*username already exists</span>";
                     }
                    if($wrongemail == true){
                        echo "<span id='formerror2'> *Invalid email address </span>";
                    }
                   if($wrongpass == true){
                    echo "<span id='formerror3'> *password does not match </span>";
                    }
                    
            ?>
    <div class="container" >
        <img src="./icons/luca-nicoletti-O8CHmj0zgAg-unsplash.jpg" alt="">
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <h2 id="su">Welcome to ArtStudio</h2>
            <p style="background: none;">enter your details</p>
            <br>
            <label for="username">username</label>
            <input type="text" name="username" required>
            <br>
            <label for="email">email-id</label>
            <input type="mail" name="email" required>
            <br>

            <label for="password">password</label>
            <input type="password" name="password" placeholder="password" required>
            <br>
            <label for="cpassword">confirm password</label>
            <input type="password" name="cpassword" placeholder="confirm password" required>
            <br>

            <label for="my_image">profile photo</label>
            <input type="file" name="my_image" id="my_image">
            <br>
            <input type="submit" name="submit" value="signup" id="btn">
            <br>
            <p style="background: none;">already have an account? <a href="log.php">log in</a></p>
        </form>
    </div>
    <footer>
        <p class="foot">copyright &copy krutarthhaldankar@gamil.com- allrights reserved</p>
    </footer>
</body>
</html>