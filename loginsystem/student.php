
<?php
session_start();
if(!isset($_SESSION['loggedin'] )|| $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Students Details</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  </head>
  <body>
  <?php
      include 'partials/dbconnect.php';
    ?>

<?php

require 'partials/_nav.php'
?>
<div class="p-3 mb-2 bg-light text-dark rounded-3">

    <div class="text-center my-2">
        <h1>Students Details</h1>
    </div>
    
    
    <div class="container my-5 p-4 border border-secondary  ">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Date</th>
                    <!-- <th scope="col">Score</th> -->

                </tr>
            </thead>
            <tbody>
                <?php
          $sql="SELECT * FROM `users`";
          $result=mysqli_query($conn,$sql);
          $Sno=0;
          while($row = mysqli_fetch_assoc($result)){
              $Sno=$Sno+1;
              echo " <tr>
              <th scope='row'>".$Sno ."</th>
              <td>". $row['fname']. " " .$row['lname'] ." </td>
              <td>". $row['username']. " </td>
              <td>". $row['dt'] ."</td>
            
              
              </tr>";
              // echo $row['Sr no'] . " Title ". $row['title']. " Desc is ". $row['description'];
              // echo "<br>";
            }
            ?>
  
</tbody>
</table>

</div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>