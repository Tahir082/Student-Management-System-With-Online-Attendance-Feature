
<?php
  session_start();
  date_default_timezone_set("Asia/Dhaka");
  $check_auth=$_SESSION['email'];
  $connection=mysqli_connect('localhost','root','','red_academy');
  $auth_query="select * from users where email='$check_auth'";
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
    <title>Red Academy|Attendance</title>
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
     <div class="card">
       <div class="cardcontainer">
           <h3>  <font style="font-family:algerian;" color="#7A1414"> Attendance </font> </h3>
           <hr/>


   <?php
      $connection=mysqli_connect('localhost','root','','red_academy');

      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
         // username and password sent from form

         $cname = mysqli_real_escape_string($connection,$_POST['coursename']);
         $teacher = mysqli_real_escape_string($connection,$_POST['teacher']);
         $temail = mysqli_real_escape_string($connection,$_POST['teacher_email']);
         $routine = mysqli_real_escape_string($connection,$_POST['routine']);
         $start = mysqli_real_escape_string($connection,$_POST['start']);
         $end = mysqli_real_escape_string($connection,$_POST['end']);
         $stdname = $_SESSION['fname'].' '.$_SESSION['lname'];
         $stdemail= $_SESSION['email'];
         date_default_timezone_set("Asia/Dhaka");
         $date = new \DateTime();
         $ptime= date_format($date, 'H:i:s');
         $show_time=date_format($date, 'H:i');
         echo '<b>Now on clock: </b>'.$show_time.'<br>';
         $pdate=date('Y-m-d');
         $show_date=date('d-m-Y');
         echo '<b>Date (dd-mm-yyyy): </b>'.$show_date.'<br>';
         $pday=date('l');
         echo '<b>Today is </b>'.$pday.'<br><br>';
         if($pday=="Sunday" || $pday=="Tuesday" && $routine=="ST")
         {
           $check="ST";
         }
         elseif($pday=="Monday" || $pday=='Wednesday' && $routine=="MW")
         {
           $check="MW";
         }
         elseif($pday=="Tuesday" || $pday=='Thursday' && $routine=="TR")
         {
           $check="TR";
         }
         elseif($pday=="Sunday" || $pday=="Thursday" && $routine=="SR")
         {
           $check="SR";
         }
         else
         {
           $check="FA";
         }

         $query = "select coursename, routine, start, end from courses where coursename='$cname'";
         $result = mysqli_query($connection,$query);
         $count = mysqli_num_rows($result);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


         if($row['routine']==$check && $ptime>=$row['start'] && $ptime<=$row['end'])
         {
             echo'<h5>Click this button to submit your attendance</h5>';
             echo'<form class="attendance" method="POST" action="attendance_confirm.php">
             <input type="hidden" name="course" value="'.$cname.'"/>
             <input type="hidden" name="t_name" value="'.$teacher.'"/>
             <input type="hidden" name="t_email" value="'.$temail.'"/>
             <input type="hidden" name="stdname" value="'.$stdname.'"/>
             <input type="hidden" name="stdemail" value="'.$stdemail.'"/>
             <input type="hidden" name="att_date" value="'.$pdate.'"/>
             <input type="hidden" name="att_time" value="'.$ptime.'"/>
             <input type="hidden" name="attend" value="1"/>
             <input type="submit" class="btn btn-primary" value="submit attendance">
             </form>';

         }
         else
         {
            echo'<h5>Attendance time for this course is over or has not started yet</h5>';
         }
      }
   ?>
 </div>
</div>
</div>


   <br><br><br>
   <script>
   $(document).ready(function(){
     $('.attendance').on('submit', function(){
       if(confirm("Submit Attendance?"))
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
