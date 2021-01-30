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

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Red Academy|Add Courses</title>
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

   <div class="container">
     <?php echo '<h3> Hello, '.$_SESSION['name'].'</h3>'; ?>
     <font color="red"><h5>You are signed in as an Admin</h5></font>
   </div>
   <br><br>
   <div class="container">
       <h3> <b> Add Course</b> </h3> <hr/>
   </div>
   <div class="container">
     <div class="content">

         <form class="add_course" action="" method="post">
           <div class="row">
             <div class="col-md-4">
               <label for="cname">Enter Course Code (Unique): </label>
               <input type="text" name="cname" class="form-control" placeholder="Enter a unique Course Code" required><br>
               <label for="routine">Choose a Routine:</label>
               <select id="routine" name="routine">
                 <option value="ST">Sunday & Tuesday</option>
                 <option value="MW">Monday & Wednesday</option>
                 <option value="SR">Sunday and Thursday</option>
                 <option value="TR">tuesday and Thursday</option>
                 <option value="FA">Friday and Saturday</option>
               </select>
               <label for="start_time">Select Start Time:</label>
               <input type="time" name="start_time" class="form-control" placeholder="Enter Course name" required><br>
               <label for="end_time">Select End Time:</label>
               <input type="time" name="end_time" class="form-control" placeholder="Enter Course name" required><br>
             </div>
           </div>
           <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
         </form>
     </div>
   </div>
   <script>
   $(document).ready(function(){
     $('.add_course').on('submit', function(){
       if(confirm("Are You sure want to add this course?"))
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

   <?php
   $connection=mysqli_connect('localhost','root','','red_academy');
     if(isset($_POST['submit']))
     {

     $cname=mysqli_real_escape_string($connection,$_POST['cname']);
     $routine=mysqli_real_escape_string($connection,$_POST['routine']);
     $start=mysqli_real_escape_string($connection,$_POST['start_time']);
     $end=mysqli_real_escape_string($connection,$_POST['end_time']);
     $query="SELECT * FROM courses where coursename='".$cname."'";
     $result = mysqli_query($connection,$query);
     $num_rows = mysqli_num_rows($result);
     if($num_rows >= 1){
       echo'<div class="container">
       <p><font color="red"> <b>Course already Exists </b></font></p>
       </div>';
       }
     else
     {
         $insert= "insert into courses values('$cname','null','null','$routine','$start','$end')";
         if(mysqli_query($connection, $insert))
         {
           echo'<div class="container">
           <p> <font color="green"> <b>The course has been added Successfully </b></font></p>
           </div>';
         }
         else
         {
           echo "Something is missing or bad connection. $insert. " . mysqli_error($connection);
         }

     }

     }
     mysqli_close($connection);


    ?>
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
