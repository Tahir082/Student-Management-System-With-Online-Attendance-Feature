<?php
  session_start();
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

   <br><br>


   <div class="container">
     <div class="middle">
      <?php    echo'<h2> <b> Course Code: <font color="red"> '.$_POST['coursename'].' </font></b> </h2>'; ?>
      <?php    echo'<h6> <b> Routine: <font color="red"> '.$_POST['routine'].' </font></b> </h6>'; ?>
     </div>
   </div>

   <div class="container">
     <?php
        $connection=mysqli_connect('localhost','root','','red_academy');
        $course_name=mysqli_real_escape_string($connection, $_POST['coursename']);
        date_default_timezone_set("Asia/Dhaka");
        $pday=date('l');
        echo 'Today is: '.$pday;
        $today='';
        if($pday=='Sunday' || $pday=='Tuesday')
        {
          $today='ST';
        }
        if($pday=='Sunday' || $pday=='Thursday')
        {
          $today='SR';
        }
        if($pday=='Tuesday' || $pday=='Thursday')
        {
          $today='TR';
        }
        if($pday=='Monday' || $pday=='Wednesday')
        {
          $today='MW';
        }
        if($pday=='Friday' || $pday=='Saturday')
        {
          $today='FA';
        }


        $q="select routine from courses where coursename='$course_name'";
        $r=mysqli_query($connection, $q);
        $a=mysqli_fetch_array($r);
        $check_routine=$a['routine'];
        $present_date=date('Y-m-d');
        if($today==$check_routine)
        {

          echo'<div class="card"><div class="cardcontainer"><div class="middle">

              <form method="POST" action="todays_attendance_teacher.php">
              <input type="hidden" name="course" value='.$course_name.'>
              <input type="submit" value="See Today`s Attendance">
              </form>
          </div></div></div>';
        }
        else
        {
          echo'<div class="card"><div class="cardcontainer"><div class="middle">

              <br><b>No class Today for '.$course_name.' </b>!!
          </div></div></div>';

        }



      ?>

      <br><br>

   </div>

   <div class="container">
     <div class="middle">
       <h3> <b>Students</b> </h3>

     </div>
     <?php
     if($_SERVER["REQUEST_METHOD"] == "POST")
     {
       $connection=mysqli_connect('localhost','root','','red_academy');
       $course_name=mysqli_real_escape_string($connection, $_POST['coursename']);

       $query="select * from courseinfo where coursename='$course_name'";
       $result=mysqli_query($connection,$query);
       $query2="select fname,lname,email from teachers";
       $result2=mysqli_query($connection,$query2);
           if($result)
           {
             if(mysqli_num_rows($result)>0){
                             echo '<table class="table" border="1">
                                 <tr>
                                     <th>
                                         Student Name
                                     </th>
                                     <th>
                                         Student Email
                                     </th>
                                     <th>
                                         Get Attendance Report
                                     </th>
                                 </tr>
                                 ';
               while($ans=mysqli_fetch_array($result))
               {
                                 echo "<tr>";
                                             echo "<td>". $ans['stdname'] ."</td>";
                                             echo "<td>". $ans['stdemail'] ."</td>";
                                             echo '<td>';
                                             echo'<form method="POST" action="attendance_reports_teacher_acc_2.php">
                                             <label for="start_date">From </label>
                                             <input type="date" name="start_date"required>
                                             <label for="end_date">To </label>
                                             <input type="date" name="end_date" required>
                                             <input type="hidden" name="coursename" value="'.$ans['coursename'].'">';
                                             echo'<input type="hidden" name="stdname" value="'.$ans['stdname'].'">';
                                             echo'<input type="hidden" name="stdemail" value="'.$ans['stdemail'].'">';
                                             echo'<input type="submit" class="btn btn-primary" value="Get Attendance Report">
                                             </form>';
                                             echo'</td>';
                                 echo "</tr>";
                  }

                           echo "</table>";

               }

           }
          else
          {
               echo "Nothing to show Here <br>";
             }

        }
        else {
           echo "Nothing to show Here <br>";
        }



                        ?>

   </div>




 </body>

 <footer>
   <div class="container">
     <div class="middle">
       <p>Abdullah Muhammad Tahir &copy;2020</p>

     </div>

   </div>
 </footer>
</html>
