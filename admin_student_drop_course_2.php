
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
    <title>Red Academy|Drop Courses</title>
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
     <div class="middle">
       <?php if($_SERVER["REQUEST_METHOD"] == "POST")
       {
         $connection=mysqli_connect('localhost','root','','red_academy');
         $falsemsg="0";
         $truemsg="0";
         $email=mysqli_real_escape_string($connection, $_POST['stdemail']);
         $req_course=mysqli_real_escape_string($connection, $_POST['course']);
         $q="select * from courseinfo where drop_req='PENDING' and stdemail='$email' and coursename='$req_course'";
         $r=mysqli_query($connection, $q);
         $a=mysqli_num_rows($r);
         $query3="delete from courseinfo where drop_req='PENDING' and stdemail='$email' and coursename='$req_course'";
         $result3=mysqli_query($connection, $query3);
         $query4="delete from attendance where and stdemail='$email' and coursename='$req_course'";
         $result4=mysqli_query($connection, $query4);

         if($a>0)
          {
            echo'<br> <b><font color="green"> Course has been dropped Successfully <br><a href="man_std.php"> Go back to Student Management Page </a></font></b>';
          }
          else
          {
            echo'<br> <b><font color="red"> Course drop FAILED!!!! <br> </font>
            You cannot drop course from a student`s account unless the student requests for drop <br>
            <a href="man_std.php"> Go back to Student Management Page </a></b>';

          }

       }

       ?>
     </div>
   </div>
   <br>


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
