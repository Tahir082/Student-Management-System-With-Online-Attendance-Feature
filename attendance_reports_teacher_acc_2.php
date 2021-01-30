<?php
  session_start();
  date_default_timezone_set("Asia/Dhaka");
  $check_auth=$_SESSION['email'];
  $connection=mysqli_connect('localhost','root','','red_academy');
  $auth_query="select * from teachers where email='$check_auth'";
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
    <title>Red Academy| Attendance Report</title>
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
        <a class="navbar-brand" href="teacher_homepage.php">
          <img src="photos/logo.png" height="75" class="d-inline-block" alt="Business"> <b><font color="red"> RED </font> ACADEMY </b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link" href="teacher_homepage.php">Home</a>
             </li>

             <li class="nav-item">
               <a class="nav-link" href="sign_out.php">Sign out</a>
             </li>
           </ul>
         </div>
     </div>
   </nav>

   <div class="container">
     <?php
     $course_name=$_POST['coursename'];
      echo'<br><br><div class="container">';
        echo'<b> <h2> Attendance Report </h2> </b><hr/>';
      echo'</div>';
      echo'<div class="container">';
      echo '<b>Student Name:</b> '.$_POST['stdname'].'<br>';
        echo'<b>Student Email:</b> '.$_POST['stdemail'].'<br>';
      echo'</div>';
      echo'<br><br>';
      echo'<div class="container">';
       echo '<h6> Course: <b>'.$course_name.'</b> </h6>';
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $connection=mysqli_connect('localhost', 'root', '','red_academy');
        $stdname= $_POST['stdname'];
        $stdemail=$_POST['stdemail'];
        $query="select coursename, routine from courseinfo where coursename='$course_name' and stdemail='$stdemail'";
        $result=mysqli_query($connection, $query);
        $query2="select coursename, att_time, att_date, attendance from attendance where coursename='$course_name' and stdemail='$stdemail'";
        $result2=mysqli_query($connection, $query2);
        $total_att=mysqli_num_rows($result2);

          $conn=mysqli_connect('localhost', 'root','','red_academy');
          $main_query="select enroll_date from courseinfo where coursename='$course_name' and stdemail='$stdemail'";
          $main_res=mysqli_query($conn, $main_query);
          $main_ans=mysqli_fetch_array($main_res);
          $enroll_date=$main_ans['enroll_date'];

          if($_POST['start_date']<$enroll_date)
          {
             echo'<br> <b> <font color="red"> You cannot select a Start Date which is before the day of enrollment of the student </font> </b> <br> <a href="teacher_manage_courses.php"> Try Again </a> <br>';
          }
          else
          {
            $s_name= $_POST['stdname'];
            $s_email=$_POST['stdemail'];
            $s_date= mysqli_real_escape_string($conn, $_POST['start_date']);
            $e_date= mysqli_real_escape_string($conn, $_POST['end_date']);
            $q="select * from attendance where coursename='$course_name' and stdemail='$stdemail' and att_date>='$s_date' and att_date<='$e_date'";
            $res=mysqli_query($conn, $q);
            $att_count= mysqli_num_rows($res);
            $pdate=date('Y-m-d');
            $present_date=strtotime($pdate);
            $pday=date('l');
            //$seconds= strtotime($e_date) -strtotime($s_date);
            //$days= abs(round($seconds/86400));
            //echo $days.'<br>';
            $start=strtotime($s_date);
            $end=strtotime($e_date);
            $e_day=date('l', $end);
            $t_date=date('Y-m-d');
            if($e_date==$t_date)
            {
              $total=1;
            }
            else
            {
              $total=0;
            }
            $start=$start-86400;

            while($start!=$end)
            {
              $day=date('l', $start);
              $query2="select coursename, routine from courses where coursename='$course_name'";
              $result2=mysqli_query($connection,$query2);
                  if($result2)
                     {
                       if(mysqli_num_rows($result2)>0)
                           {
                             while($ans2=mysqli_fetch_array($result2))
                               {

                                             $routine=$ans2['routine'];
                                             if($routine=='ST')
                                             {
                                               $day1='Sunday';
                                               $day2='Tuesday';
                                               if($day==$day1 || $day==$day2)
                                               {
                                                 $total++;

                                               }
                                             }
                                             if($routine=='MW')
                                             {
                                               $day1='Monday';
                                               $day2='Wednesday';
                                               if($day==$day1 || $day==$day2)
                                               {
                                                 $total++;

                                               }
                                             }
                                             if($routine=='TR')
                                             {
                                               $day1='Tuesday';
                                               $day2='Thursday';
                                               if($day==$day1 || $day==$day2)
                                               {
                                                 $total++;

                                               }
                                             }
                                             if($routine=='SR')
                                             {
                                               $day1='Sunday';
                                               $day2='Thursday';
                                               if($day==$day1 || $day==$day2)
                                               {
                                                 $total++;

                                               }
                                             }
                                             if($routine=='FA')
                                             {
                                               $day1='Friday';
                                               $day2='Saturday';
                                               if($day==$day1 || $day==$day2)
                                               {
                                                 $total++;

                                               }

                                             }

                               }

                           }
                       }
                 else
                 {
                      echo "Nothing to show Here <br>";
                 }
              $start=$start+86400;
            }



          $score= ($att_count/$total)*100;
          echo '<br> Enrollment Date of <b>'.$s_name.'</b> in this Course: <b>'.$enroll_date. '</b>';
          echo '<br> Number of classes Conducted from <b>'.$s_date.'</b> to <b>'.$e_date.'</b> is: <b>'.$total.'</b>';
          echo '<br> Number of Classes attended by <b>'.$s_name.'</b> is= <b>'.$att_count.'</b>';
          echo '<br> <b>Attendance Score= '.$score.'% </b>';
          echo '<br><br><br> Note: Date format is (yyyy-mm-dd)';
        }
        }
      ?>

   </div>

<br><br><br><br><br>
 </body>

 <footer>
   <div class="container">
     <div class="middle">
       <p>Abdullah Muhammad Tahir &copy;2020</p>
     </div>
   </div>
 </footer>
</html>
