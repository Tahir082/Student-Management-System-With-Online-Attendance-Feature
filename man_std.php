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

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Red Academy|Manage Students</title>
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
     <div class="middle">
       <form class="form-group" action="search_std.php" method="POST">
         <input type="email" name="stdemail" placeholder="Type Student Email">
         <input type="submit" class="btn btn-success" value="Search">
       </form>
     </div>
   </div>

    <div class="container">
      <?php
      $connection=mysqli_connect('localhost','root','','red_academy');
      $pdate=date('Y-m-d');
      $show_date=date('d-m-Y');
      echo 'Today`s date is: <b>'.$show_date.'</b>';
      $query="select * from users";
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
                                        Contact
                                    </th>
                                    <th>
                                        Date of Birth
                                    </th>
                                    <th>
                                        Update Student Profile
                                    </th>
                                    <th>
                                        Course Drop Request
                                    </th>
                                </tr>
                                ';
              while($ans=mysqli_fetch_array($result))
              {
                                echo "<tr>";
                                            $stdemail=$ans['email'];
                                            echo "<td>". $ans['fname']." ".$ans['lname']."</td>";
                                            echo "<td>".$ans['email']."</td>";
                                            echo "<td>".$ans['contact']."</td>";
                                            echo "<td>".$ans['dob']."</td>";
                                            echo '<td>';

                                            echo'<form method="POST" action="edit_profile_student.php">
                                            <input type="hidden" name="stdemail" value="'.$stdemail.'">
                                            <input type="submit" value="Edit Profile" class="btn btn-primary">

                                            </form>';

                                            echo'</td>';
                                            echo '<td>';

                                            echo'<form method="POST" action="admin_student_drop_course.php">
                                            <input type="hidden" name="stdemail" value="'.$stdemail.'">
                                            <input type="submit" value="See Courses" class="btn btn-danger">
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
