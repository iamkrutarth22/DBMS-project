<?php
$insert=false;
if(isset($_POST['Aname']) && isset($_POST['submit'])&& isset($_FILES['my_image']))
{
  
  include 'connect.php';
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
		        header("Location: index.php?error=$em");
			}	
	}
  else{
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}
  $sql2 = "SELECT AID FROM `artwork` where AID=(SELECT MAX(AID) FROM artwork);";
  $result = mysqli_query($con, $sql2);
  while($row = mysqli_fetch_assoc($result)){
    $key=$row['AID'];
  }
  $key++;
  $Aname = $_POST['Aname'];
  $description = $_POST['desc'];
  $price = $_POST['price'];
  $status = $_POST['status'];
  $sql =" INSERT INTO `artwork` ( Aname, description, price, status, picture, AID) VALUES ('$Aname', '$description', ' $price', '$status', '$img_upload_path','$key')";  
  if($con->query($sql) == true){
        $insert=true;
  }
  else{
        echo "ERROR: $sql <br> $con->error";
  }
  $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add-Artwork</title>
  <link rel="stylesheet" href="./css/admindesign.css">
  <link rel="icon" href="Group 1.jpg" type="image/jpg">
  
</head>

<body>
  <header>
    <img src="profile.png" class="profile">
    <div style="background:none;padding:0 10px ;color: aliceblue;">Admin</div>
  </header>
  <div class="panel1">
    <div>
      <ul>
        <div class="line">
          <li><a href="dashboard.php">Dashboard</a></li>
        </div>
        <div class="line">
          <li style=" background-color: rgb(38, 63, 70);"><a href="paintingadd.php"
              style="color:rgb(255, 255, 255);background: none;"> Add Artwork </a></li>
        </div>
        <div class="line">
          <li><a href="soldpaintnigs.php" > Orders</a></li>
        </div>
        <div class="line">
          <li><a href="artistadd.php"> Artist info</a></li>
        </div>
        <div class="line">
          <li><a href="artworkdetails.php"> Artwork </a></li>
        </div>
        <div class="line">
          <li><a href="logout.php">Log-out</a></li>
        </div>
      </ul>
    </div>
    <div class="container">
        <?php
          if($insert == true){
          echo "
              <div class='submitMsg'>painting details inserted successfully</div>
              ";
          }
          ?>
          
          <form action="paintingadd.php" method="post" enctype="multipart/form-data">
            <h1>Enter paintings to database</h3>
              <p>enter the details</p>
          <input type="text" name="Aname" id="Aname" placeholder="Enter painting title(name)">
          <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter painting description"></textarea>
          <input type="number" name="price" id="price" placeholder="Enter painting price">
          <input type="file" name="my_image" id="my_image">
          <label for="status" class="LB">select painting status:</label>
          <select id="status" name="status">
            <option value="sold">sold</option>
            <option value="not sold">not sold</option>
          </select>
          <input type="submit" name="submit" value="Upload" class="btn">
        </form>
    </div>
  </div>
</body>

</html>