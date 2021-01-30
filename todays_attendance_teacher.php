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
    <title>Red Academy| Attendance</title>
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
     <div class="middle">
       <h3> <b>Today's Attendance</b> </h3>

     </div>

   </div>

  <div class="container">

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $connection=mysqli_connect('localhost','root','','red_academy');
      $course_name=mysqli_real_escape_string($connection, $_POST['course']);
      $pdate=date('Y-m-d');
      $show_date=date('d-m-Y');
      echo 'Today`s date is: <b>'.$show_date.'</b>';
      $query="select * from courseinfo where coursename='$course_name'";
      $result=mysqli_query($connection,$query);
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
                                        Attendance
                                    </th>
                                </tr>
                                ';
              while($ans=mysqli_fetch_array($result))
              {
                                echo "<tr>";
                                $stdemail=$ans['stdemail'];
                                            echo "<td>". $ans['stdname']."</td>";
                                            echo "<td>".$ans['stdemail']."</td>";
                                            echo '<td>';
                                            $query2="select * from attendance where coursename='$course_name' and att_date='$pdate' and stdemail='$stdemail'";
                                            $result2=mysqli_query($connection,$query2);
                                            $c=mysqli_num_rows($result2);
                                            if($c>0)
                                            {
                                              echo '<font color="green"> <b>Present</b> </font>';
                                            }
                                            else
                                            {
                                              echo '<font color="red"> <b>Absent</b> </font>';
                                            }
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
