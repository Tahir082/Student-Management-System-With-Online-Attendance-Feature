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
    <title>Red Academy|Delete Courses</title>
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
        <b><h2>Delete a Course</h2></b>
    </div>
    <div class="container">
      <div class="middle">
        <?php
        $connection=mysqli_connect('localhost','root','','red_academy');

        $query="select * from courses";
        $result=mysqli_query($connection,$query);
        if(!empty($_SESSION['message'])) {
          $message = $_SESSION['message'];
          echo $message;
          $_SESSION['message']="";
          echo'<div class="container">
          <p> <b><a href="delete_courses.php"> Refresh Page </a></b> <br></p>
          </div>';
        }
            if($result)
            {
            if(mysqli_num_rows($result)>0)
            {
                            echo '<table class="table" border="1">
                                <tr>
                                    <th>
                                        Course Name
                                    </th>
                                    <th>
                                        Assigned Teacher
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
                                    Remove Course

                                    </th>
                                </tr>
                                ';
              while($ans=mysqli_fetch_array($result))
              {
                                echo "<tr>";
                                            echo "<td>". $ans['coursename'] ."</td>";
                                            echo "<td>". $ans['teacher'] ."</td>";
                                            echo "<td>". $ans['routine'] ."</td>";
                                            echo "<td>". $ans['start'] ."</td>";
                                            echo "<td>". $ans['end'] ."</td>";
                                            echo '<td>';
                                            echo'<form class="delete_course" method="POST" action="">
                                            <input type="hidden" name="course" value="'.$ans['coursename'].'">';
                                            echo'<input type="submit" class="btn btn-danger" value="Delete Course">
                                            </form>';
                                            if($_SERVER["REQUEST_METHOD"] == "POST")
                                            {
                                              $coursename=mysqli_real_escape_string($connection,$_POST['course']);

                                              $query2="delete from courses where coursename='$coursename'";
                                              $query3="delete from courseinfo where coursename='$coursename'";
                                              $query4="delete from attendance where coursename='$coursename'";
                                              $result2=mysqli_query($connection,$query2);
                                              $result3=mysqli_query($connection,$query3);
                                              $result4=mysqli_query($connection,$query4);
                                              if ($result2) {
                                                $truemsg='<div class="container">
                                                <p> <b><font color="green"> Course has been deleted SUCCESSFULLY</b> <br></p>
                                                </div>';
                                                $_SESSION['message'] = $truemsg;
                                              header("location: delete_courses.php");
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
   <br>


   <br><br><br>
   <script>
   $(document).ready(function(){
     $('.delete_course').on('submit', function(){
       if(confirm("Are You sure want to Delete this course?"))
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
