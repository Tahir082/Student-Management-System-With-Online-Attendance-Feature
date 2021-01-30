<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
$check_auth=$_SESSION['email'];
$connection=mysqli_connect('localhost','root','','red_academy');
$auth_query="select * from admin where email='$check_auth'";
$check_result=mysqli_query($connection, $auth_query);
$count_auth=mysqli_num_rows($check_result);
if($count_auth==0)
{
  echo'<br>Unauthorized Access!! Permission Denied!!!! <br> <a href="sign_out.php"> Destroy Session </a>';
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Red Academy|Manage Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="admin_homepage.php">
          <img src="photos/logo.png" height="75" class="d-inline-block" alt="Business"> <b><font color="red"> RED </font> ACADEMY </b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link" href="admin_homepage.php">Home</a>
             </li>
             
             <li class="nav-item">
               <a class="nav-link" href="sign_out.php">Sign out</a>
             </li>
           </ul>
         </div>
     </div>
   </nav>
   <br><br>

   <div class="cardcontainer">
     <div class="middle">
       <h3> <b>Student Information</b> </h3>
     </div>
   </div>
   <div class="container">


     <?php
     if($_SERVER["REQUEST_METHOD"] == "POST")
     {
       $connection=mysqli_connect('localhost', 'root', '', 'red_academy');
       $fname=mysqli_real_escape_string($connection, $_POST['fname']);
       $lname=mysqli_real_escape_string($connection, $_POST['lname']);
       $stdemail=mysqli_real_escape_string($connection, $_POST['oldemail']);
       $newemail=mysqli_real_escape_string($connection, $_POST['email']);
       $contact=mysqli_real_escape_string($connection, $_POST['contact']);
       $dob=mysqli_real_escape_string($connection, $_POST['dob']);
       $query="update users set fname='$fname', lname='$lname', email='$newemail', dob='$dob', contact='$contact' where email='$stdemail'";
       $result=mysqli_query($connection, $query);
       if($result)
       {
         echo'<br> <b> <font color="green"> Student Profile Updated Successfully </b> <br> <a href="man_std.php"> Go back to student management page </a> <br></font>';
       }
     }
     ?>
   </div>

   <br><br><br>
 </body>

 <footer>
   <div class="container">
     <div class="middle">
       <p>Abdullah Muhammad Tahir &copy;2020</p>

     </div>

   </div>
 </footer>
 </html>
