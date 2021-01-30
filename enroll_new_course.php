<?php
session_start();
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
     <title>Red Academy|Assign Teacher to Courses</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/custom.css">
     <script src="jquery-3.5.1.slim.min.js"></script>
     <script src="popper.min.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>
   </head>
   <body>
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
        <h1>Available Courses</h1>

    </div>
    <br>
    <div class="container">
      <div class="middle">
        <?php
        $falsemsg="null";
        $truemsg="null";
        $connection=mysqli_connect('localhost','root','','red_academy');

        $query="select * from courses where teacher!='null'";
        $result=mysqli_query($connection,$query);
        $query2="select fname,lname,email from users";
        $result2=mysqli_query($connection,$query2);

            if($result)
            {
            if(mysqli_num_rows($result)>0){
                            echo '<table class="table" border="1" cellpadding="10px">
                                <tr>
                                    <th>
                                        Course Name
                                    </th>
                                    <th>
                                        Routine
                                    </th>
                                    <th>
                                        Start Time
                                    </th>
                                    <th>
                                        End Time
                                    </th>
                                    <th>
                                    Course Instructor

                                    </th>
                                    <th>
                                    Email

                                    </th>
                                    <th>
                                    Enroll

                                    </th>
                                </tr>
                                ';
              while($ans=mysqli_fetch_array($result))
              {
                                echo "<tr>";
                                            echo "<td>". $ans['coursename'] ."</td>";
                                            echo "<td>". $ans['routine'] ."</td>";
                                            echo "<td>". $ans['start'] ."</td>";
                                            echo "<td>". $ans['end'] ."</td>";
                                            echo "<td>". $ans['teacher'] ."</td>";
                                            echo "<td>". $ans['teacher_email'] ."</td>";
                                            echo '<td>';
                                            echo'<form class="enroll" method="POST" action="">
                                            <input type="hidden" name="cname" value="'.$ans['coursename'].'">';
                                            echo'<input type="hidden" name="teacher" value="'.$ans['teacher'].'">';
                                            echo'<input type="hidden" name="routine" value="'.$ans['routine'].'">';
                                            echo'<input type="hidden" name="teacher_email" value="'.$ans['teacher_email'].'">';
                                            echo'<input type="hidden" name="stdname" value="'.$_SESSION['fname'].' '.$_SESSION['lname'].'">';
                                            echo'<input type="hidden" name="stdemail" value="'.$_SESSION['email'].'">';
                                            echo'<input type="submit" class="btn btn-primary" value="Enroll Course">
                                            </form>';
                                            if($_SERVER["REQUEST_METHOD"] == "POST")
                                            {

                                              $cname=mysqli_real_escape_string($connection,$_POST['cname']);
                                              $routine=mysqli_real_escape_string($connection,$_POST['routine']);
                                              $stdname=mysqli_real_escape_string($connection,$_POST['stdname']);
                                              $stdemail=mysqli_real_escape_string($connection,$_POST['stdemail']);
                                              $teacher=mysqli_real_escape_string($connection,$_POST['teacher']);
                                              $teacher_email=mysqli_real_escape_string($connection,$_POST['teacher_email']);
                                              $enroll_date=date('Y-m-d');
                                              $query3="select * from courseinfo where coursename='$cname' and stdemail='$stdemail'";
                                              $result3 = mysqli_query($connection,$query3);
                                              $num_rows = mysqli_num_rows($result3);
                                              if($num_rows>0){
                                                  $falsemsg='<div class="container">
                                                  <p> <b><font color="red"> You have been enrolled in this course already </b> <br><a href="enroll_new_course.php"> Refresh Page </a></p>
                                                  </div>';
                                                }
                                                else
                                                {
                                                  $query4="insert into courseinfo values('$cname','$routine','$teacher','$teacher_email','$stdname','$stdemail','$enroll_date', 'null')";
                                                  $result4=mysqli_query($connection,$query4);
                                                  if ($result4) {
                                                    $truemsg='<div class="container">
                                                    <p> <b><font color="green"> You have been enrolled in this course SUCCESSFULLY</b> <br> <a href="enroll_new_course.php"> Refresh Page </a></p>
                                                    </div>';

                                                  }
                                                  else {
                                                    echo'Bad connection!! <a href="homepage.php">  go back to homepage </a>';
                                                  }

                                                }


                                            // Close connection
                                            }
                                            echo'</td>';
                                echo "</tr>";
                }

                          echo "</table>";


              }
              }
              else {
                echo "Nothing to show Here <br>";
              }


              if($truemsg!="null")
              {
                $falsemsg="null";
                echo $truemsg;

              }
              else {

              }
              if($falsemsg=="null")
              {

              }
              else {
                echo $falsemsg;
              }


                           ?>
      </div>
    </div>
    <script>
    $(document).ready(function(){
      $('.enroll').on('submit', function(){
        if(confirm("Are You sure want to enroll in this course?"))
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
 </html>
