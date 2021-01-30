<?php session_start();
$check_auth=$_SESSION['email'];
$connection=mysqli_connect('localhost','root','','red_academy');
$auth_query="select * from users where email='$check_auth'";
$check_result=mysqli_query($connection, $auth_query);
$count_auth=mysqli_num_rows($check_result);
if($count_auth==0)
{
  echo'<br>Unauthorized Access!! Permission Denied!!!! <br> <a href="sign_out.php"> Destroy Session </a>';
  exit();
}?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <title>Red Academy| Attendance Confirmation</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/custom.css">
     <script src="jquery-3.5.1.slim.min.js"></script>
     <script src="popper.min.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>
   </head>
   <body>
     <style media="screen">
       .card {
 /* Add shadows to create the "card" effect */
           box-shadow: 0 4px 8px 0 rgba(0,0,0,0.5);
           transition: 0.3s;
         }

         /* On mouse-over, add a deeper shadow */
       .card:hover {
         box-shadow: 0 8px 16px 0 rgba(0,0,0,0.5);
             }

             /* Add some padding inside the card container */
       .cardcontainer {
           padding: 30px 30px;
           }
     </style>
     <nav class="navbar navbar-expand-lg navbar-light">
       <div class="container">
         <a class="navbar-brand" href="homepage.php">
           <img src="photos/logo.png" height="75" class="d-inline-block" alt="Business"> <b><font color="red"> RED </font> ACADEMY </b>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="homepage.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sign_out.php">Sign out</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>

    <div class="container">
      <?php echo '<h3> Hello, '.$_SESSION['fname'].' '.$_SESSION['lname'].'</h3>'; ?>
        <h5>  You are signed in as <font color="red">Student </font>  </h5>
    </div>
    <br><br>

    <div class="container">
      <div class="middle">
        <div class="card">
          <div class="cardcontainer">
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
          $connection=mysqli_connect('localhost','root','','red_academy');
          $course=mysqli_real_escape_string($connection, $_POST['course']);
          $teacher_name=mysqli_real_escape_string($connection, $_POST['t_name']);
          $teacher_email=mysqli_real_escape_string($connection, $_POST['t_email']);
          $s_name=mysqli_real_escape_string($connection, $_POST['stdname']);
          $s_email=mysqli_real_escape_string($connection, $_POST['stdemail']);
          $attendance=mysqli_real_escape_string($connection, $_POST['attend']);
          $att_date=mysqli_real_escape_string($connection, $_POST['att_date']);
          $att_time=mysqli_real_escape_string($connection, $_POST['att_time']);
          $show_date=date('d-m-Y');
          $show_day=date('l');
          $query2="select attendance from attendance where coursename='$course' and stdemail='$s_email' and att_date='$att_date' and attendance='1'";
          $result2=mysqli_query($connection, $query2);
          $ans2=mysqli_fetch_array($result2);
          $count=mysqli_num_rows($result2);
          if($count>=1)
          {
            echo'<h3><b>Your attendace for Course "'.$course.'" <font color="red">HAS BEEN RECORDED ALREADY</font> for today </b></h3> <hr/><br> <a href="enrolled_course.php"> <b>Go back to MY COURSES</b></a><br>';
          }
          else
          {
            $insert="insert into attendance values('$course', '$teacher_name', '$teacher_email', '$s_name', '$s_email', '$att_time', '$att_date', '$attendance')";
            mysqli_query($connection, $insert);

            echo'<h3><b> <font color="green">Attendance has been recorded SUCCESSFULLY for Course '.$course.'</font> </b></h3><hr/><br> <a href="enrolled_course.php"><b> Go back to MY COURSES</a> </b><br>';
            echo'<b>Attendance Record Time and Date:</b> @ '.$att_time.' on '.$show_date.' ('.$show_day.')';
          }

        }


         ?>

      </div>
    </div>
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
