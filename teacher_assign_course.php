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
        <h1>Available Courses</h1>
        <h5>These are the courses where no teacher has been assigned</h5>
    </div>
    <br>
    <div class="container">
      <div class="middle">
        <?php
        $connection=mysqli_connect('localhost','root','','red_academy');

        $query="select * from courses where teacher='null'";
        $result=mysqli_query($connection,$query);
        $query2="select fname,lname,email from teachers";
        $result2=mysqli_query($connection,$query2);
        if(!empty($_SESSION['message'])) {
          $message = $_SESSION['message'];
          echo $message;
          $_SESSION['message']="";
          echo'<div class="container">
          <p> <b><a href="teacher_assign_course.php"> Refresh Page </a></b> <br></p>
          </div>';
        }
            if($result)
            {
            if(mysqli_num_rows($result)>0){
                            echo '<table class="table" border="1">
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
                                    Select Teacher & Assign

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
                                            echo '<td>';
                                            echo'<form class="assign" method="POST" action="">
                                            <input type="hidden" name="cname" value="'.$ans['coursename'].'">';
                                            echo'<select id="teacher_email" name="teacher_email">';
                                                if($result2)
                                                {
                                                if(mysqli_num_rows($result2)>0)
                                                {
                                                  foreach($result2 as $row)
                                                  {
                                                    echo'<option value="'.$row['email'].'">'.$row['fname'].' '.$row['lname'].'</option>';

                                                  }
                                                }
                                                }
                                            echo'</select>
                                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-primary" value="Assign Teacher">
                                            </form>';
                                            if($_SERVER["REQUEST_METHOD"] == "POST")
                                            {
                                              $cname=mysqli_real_escape_string($connection,$_POST['cname']);
                                              $t_email=mysqli_real_escape_string($connection,$_POST['teacher_email']);
                                              $tquery="select fname, lname from teachers where email='$t_email'";
                                              $tresult=mysqli_query($connection,$tquery);
                                              $ans=mysqli_fetch_array($tresult);
                                              $t_fname=$ans['fname'];
                                              $t_lname=$ans['lname'];
                                              $t_name=$t_fname.' '.$t_lname;
                                              $query3="update courses set teacher='$t_name', teacher_email='$t_email' where coursename='$cname'";
                                              $result3=mysqli_query($connection,$query3);
                                              if ($result3) {
                                                $truemsg='<div class="container">
                                                <p> <b><font color="green"> Teacher has been assigned SUCCESSFULLY</b> <br></p>
                                                </div>';
                                                $_SESSION['message'] = $truemsg;
                                                header('location: teacher_assign_course.php');

                                              }
                                              else {
                                                echo'Bad connection!! <a href="admin_homepage.php">  go back to homepage </a>';
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
                           ?>
      </div>
    </div>
    <script>
    $(document).ready(function(){
      $('.assign').on('submit', function(){
        if(confirm("Are You sure want to assign selected teacher to this course?"))
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
