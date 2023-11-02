<?php

$host = "localhost";  
$user = "root";  
$password = '';
$db_name = "artstudio";  
  
$conn = mysqli_connect($host, $user, $password, $db_name); 
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}

$AID = $_GET['AID'];

?>
<html style="
    background: black;
">
<p style="padding-left: 30px;
    padding-top: 14px;
    color: white;font-size: 30px;">ArtSTUDIO </p>
<center><form action="edit-confirm.php" method="POST" style="
    margin-top: 15pc;
">

  <label class="form-label" for="disabledInput" style="color: aliceblue">Artist ID</label>
<div class="form-outline mb-4">
                <input class="form-control" id="disabledInput" type="text" name="AID" value="<?php echo $AID ?>" readonly="">
                  
                </div>

<div class="form-outline mt-4" style="
    width: 36%;
    padding: 20px 30px;
    margin: 24px 0;
    box-sizing: border-box;
">
                <select class="form-select form-control form-control-lg text-center" aria-label="Default select example" name="change">
                <option selected>-------Select operation-------</option>
            <option value="status">status</option>
            <option value="price">price</option>
                </select>
                </div>

          <div class="form-outline mb-4" style="
    width: 36%;
    padding: 20px 30px;
    margin: 24px 0;
    box-sizing: border-box;
">
                <input class="form-control" type="text"  name="change_value">
                <label class="form-label" for="change_value"></label>
                </div>
                <a href="edit-confirm.php" >
                  <input type="submit" style="background-color: #04AA6D;
    border: none;
    color: white;
    padding: 23px 48px;
    text-decoration: none;
    margin: 13px 2px;
    cursor: pointer;">
                </a>
</center>

</form>
</html>