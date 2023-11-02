<?php
        $host = "localhost";  
        $user = "root";  
        $password = '';  
        $db_name = "artstudio";  
          
        $conn = mysqli_connect($host, $user, $password, $db_name); 
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }

        if(isset($_REQUEST['delete'])){

          $USER = $_REQUEST['AID'];

          $conn1 = mysqli_connect('localhost','root', '', 'artstudio'); 

          $sql = "DELETE FROM artwork WHERE AID = '$USER'";

          if($result1 = mysqli_query($conn1,$sql)){

            echo "<script>alert('Record Deleted Successfully')</script>";
          }
          else{
            echo "<script>alert('Unable to Delete')</script>";
          }

        }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <title>ArtSTUDIO</title>
    
  </head>
  
  <body background="aliceblue">

    <!-- Display data -->
    <p style="padding-left: 30px;
    padding-top: 14px;
    color: black;font-size: 30px;">ArtSTUDIO </p>
    <div class="mx-3 my-5">        <!--row justify-content-center -->
      
    
      <table class="table table-hover table-dark">
           <thead> <!--  table-fit -->
            <tr>
                <th>Artist</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th>Picture</th>
                <th>Artist id</th>

  
                 <!-- NEW -->
                <th>Edit</th>
                <th>Delete</th>
                
        </tr>
            </thead>
             <!-- PHP CODE TO FETCH DATA FROM ROWS -->
  
            <tbody>
  
            
  
            <?php 
      
              $query = "SELECT * FROM artwork";
  
              if ($result = mysqli_query($conn,$query)) { 
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $AID = $row["AID"];
  
                      echo '<tr> 
                              <td>' . $row["Aname"] . '</td>
                              <td>' . $row["description"] . '</td>
                              <td>' . $row["price"] . '</td>
                              <td>' . $row["status"] . '</td>
                              <td>' . $row["picture"] . '</td> 
                              <td>' . $row["AID"] . '</td> 
                          
                              <td><a href="admin-edit.php?AID='.$AID.'"><button class="btn btn-sm btn-success">
                              Edit</button></td>
                              <td><form action="" method="POST"><input type="hidden" name="AID" value=' . $row["AID"] . '><input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"></form></td>
                            </tr>';
  
                            // NOTE: in URL dont give spaces
                      
                echo "<tr>";
                
                
                
                }
                  mysqli_free_result($result);
              } 
  
              ?>
          </tbody>
        </table>
  
         
  </div>
        
    
    <footer class="mx-2 fixed-bottom">
      <div class="row">
        <div class="col-md-6">
          <p>@2022 ArtSTUDIO All Rights Reserved.</p>
        </div>
        <!-- <div class="col-sm-2 col-xs-6"></div>
        <div class="col-sm-2 col-xs-6"></div> -->
        <div class="col-md-6" style="text-align: right;">
          <a href=""
            >Terms &amp; Conditions</a
          >
          |<a href=""> Privacy Policy</a>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
