<?php
session_start();
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
date_default_timezone_set("Asia/Dhaka");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $connection=mysqli_connect('localhost', 'root', '', 'red_academy');
  $email=mysqli_real_escape_string($connection, $_POST['email']);
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Red Academy|Manage Teacher</title>
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
       <h3> <b>Teacher Information</b> </h3>
     </div>
   </div>
   <div class="container">

     <form class="edit" action="edit_profile_teacher_confirm.php" method="POST">
       <label class="form-group" for="fname">Edit First Name</label>
       <input type="text" name="fname" placeholder="Enter Firstname" required> <br>
       <label class="form-group" for="lname">Edit Last Name</label>
       <input type="text" name="lname" placeholder="Enter Lastname" required> <br>
       <?php echo '<input type="hidden" name="oldemail" value="'.$email.'">';?>
       <label class="form-group" for="email">Edit  Email</label>
       <input type="text" name="email" placeholder="Enter Email" required> <br>
       <label class="form-group" for="contact">Enter new Contact Number:</label>
       <input type="text" name="contact" placeholder="Enter New Contact" required><br>
       <label class="form-group" for="email">Edit Date of Birth:</label>
       <input type="date" name="dob" placeholder="Enter Date of Birth"><br>
       <input type="submit" class="btn btn-success" value="Confirm Edit" required>
     </form>
   </div>

   <br><br><br>
   <script>
   $(document).ready(function(){
     $('.edit').on('submit', function(){
       if(confirm("Are You sure?"))
       {
         return true;
       }
       else
       {
         return false;
       }

     });
   });

   </script>
 </body>

 <footer>
   <div class="container">
     <div class="middle">
       <p>Abdullah Muhammad Tahir &copy;2020</p>

     </div>

   </div>
 </footer>
 </html>
