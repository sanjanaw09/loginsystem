<?php
session_start();
if(!isset($_SESSION['loggedin'] )|| $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
include 'partials/dbconnect.php';
$update=false;
$delete=false;

if(isset($_GET['delete'])){
	$sno=$_GET['delete'];
	$delete=true;
	$sql="DELETE FROM `users` WHERE `users`.`sno` = $sno";
	$result=mysqli_query($conn,$sql);
  }

  if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['snoEdit'])){
	 $sno=$_POST["snoEdit"];
	 $fname=$_POST["fnameEdit"];
	 $lname=$_POST["lnameEdit"];
	 $username=$_POST["usernameEdit"];
	 $password=$_POST["passwordEdit"];
	 $date=$_POST["dateEdit"];
 
	  $sql="UPDATE `users` SET `fname` = '$fname' ,`lname` = '$lname' , `username`='$username' , `password`='$password' , `dt`='$date'  WHERE `users`.`sno` = $sno;";
	 
	  $result=mysqli_query($conn,$sql);
	  if ($result){
	   // echo "data added";
	   $update=true;
   }
   else{
	   echo "data not added bcz of ".mysqli_error($conn);
   
   }
	}
}
// else{
// $title=$_POST["title"];
// $description=$_POST["description"];

// $sql="INSERT INTO `notes` ( `title`, `description`) VALUES ( '$title', '$description')";

// $result=mysqli_query($conn,$sql);
// if ($result){
// 	   // echo "data added";
// 	   $insert=true;
//    }
//    else{
// 	   echo "data not added bcz of ".mysqli_error($conn);
   
//    }
//  }
// }

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

    <title>Admin-Students Details</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  </head>
  <body>
  <?php
      include 'partials/dbconnect.php';
    ?>

<?php

require 'partials/_nav.php'
?>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Student data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/loginsystem/user_action.php" method="POST">
        <div class="modal-body">
        <input type="hidden" name="snoEdit" id="snoEdit">
           
              
           
			<div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <textarea class="form-control" id="fnameEdit" name="fnameEdit"  rows="3"></textarea>
              </div>
			  <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <textarea class="form-control" id="lnameEdit" name="lnameEdit"  rows="3"></textarea>
              </div>
			  <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="usernameEdit" name="usernameEdit" aria-describedby="emailHelp">
			  </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <textarea class="form-control" id="passwordEdit" name="passwordEdit"  rows="3"></textarea>
              </div>
			  <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <textarea class="form-control" id="dateEdit" name="dateEdit"  rows="3"></textarea>
              </div>
            

          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
    </div>
  </div>
</div>








<div class="p-3 mb-2 bg-light text-dark rounded-3">

    <div class="text-center my-2">
        <h1>Students Details</h1>
		<form action="/loginsystem/user_action.php" method="POST">
    </div>
    
    
    <div class="container my-5 p-4 border border-secondary  ">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">First Name</th>
					<th scope="col">Last Name</th>
                    <th scope="col">Username</th>
					<th scope="col">Password</th>
                    <th scope="col">Date</th>
					<th scope="col">Actions</th>
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
			  <td>". $row['fname']. " </td>
			  <td>". $row['lname']. " </td>
              <td>". $row['username']. " </td>
			  <td>". $row['password']. " </td>
              <td>". $row['dt'] ."</td>
			  <td><button class='edit btn btn-sm btn-primary' id=" .$row['sno'].">Edit</button>  <button class='btn btn-sm btn-primary delete' id=d" .$row['sno'].">Delete</button> </td>
    
              
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

<script>
      edits=document.getElementsByClassName('edit');
      Array.from(edits).forEach(element => {
          element.addEventListener("click",(e)=>{
            console.log("edit",);
            tr=e.target.parentNode.parentNode;
            fname=tr.getElementsByTagName("td")[0].innerText;
			lname=tr.getElementsByTagName("td")[1].innerText;
            username=tr.getElementsByTagName("td")[2].innerText;
			password=tr.getElementsByTagName("td")[3].innerText;
			date=tr.getElementsByTagName("td")[4].innerText;

            console.log(fname,lname,username,password,date);
            fnameEdit.value=fname;
			lnameEdit.value=lname;
            usernameEdit.value=username;
			passwordEdit.value=password;
			dateEdit.value=date;
            snoEdit.value=e.target.id;
            console.log(e.target.id);
            $('#editModal').modal('toggle');
          })  
      })



      deletes=document.getElementsByClassName('delete');
      Array.from(deletes).forEach(element => {
          element.addEventListener("click",(e)=>{
            console.log("edit",);
            sno=e.target.id.substr(1,)
           if(confirm("Are you sure you want to delete this !")){
              console.log("yes");
              window.location=`/loginsystem/user_action.php?delete=${sno}`;
              //TODO: create a form and user post request to submit a form
           }
          })  
      })
</script>



    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>