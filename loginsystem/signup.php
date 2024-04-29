<?php
    $showAlert=false;
    $showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/dbconnect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    // $exits=false;

    $existSql="SELECT * FROM `users` WHERE username='$username'";
    $result= mysqli_query($conn,$existSql);
    $numExitsRows=mysqli_num_rows($result);
    if($numExitsRows>0){
        // $exits=true;
        $showError=" username already exits";
    }
    
    else{
        // $exits=false;
        if($password==$cpassword){
            // $hash=password_hash($password,PASSWORD_DEFAULT);
             $sql=" INSERT INTO `users` (`fname`, `lname`, `username`, `password`, `dt`) VALUES ('$fname', '$lname', '$username', '$password', current_timestamp())";
            // $sql="INSERT INTO `users` (  `username`, `password`, `dt`) VALUES ( '$username', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
            }
        }
        else{
            $showError="Passwords do not match ";
        }
        

    }
    // header("location: welcome.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title>Signup</title>
  </head>
  <body>
    <?php

require 'partials/_nav.php'
?>

<?php
if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Account has neen created.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '. $showError .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<div class="container my-4 p-5 mb-2 bg-dark text-white rounded-3 border border-secondary bg-opacity-75">
    <h1 class="text-center">
        Signup to our website
    </h1>

    <form action="/loginsystem/signup.php" method="post">
    <div class="row mb-3 ">
                            <div class="col-lg-6">
                                <label class="m-2">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" >

                            </div>

                            <div class="col-lg-6">
                                <label class="m-2">Last name</label>
                                <input type="text" name="lname" id="lname" class="form-control" >
                            </div>
                        </div>
    

  <div class="mb-3 ">
    <label for="username" class="form-label">Username</label>
    <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3 ">
    <label for="password" class="form-label">Password</label>
    <input type="password"  maxlength="23" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3 ">
    <label for="cpassword" class="form-label">ConfirmPassword</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">Make sure to type the same password</div>
  </div>
  
  <button type="submit" class="btn btn-primary">Signup</button>
</form>

</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
</body>
</html>