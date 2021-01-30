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
    <title>Red Academy| Drop Courses</title>
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

   <div class="container">
     <?php echo '<h3> Hello, '.$_SESSION['fname'].' '.$_SESSION['lname'].'</h3>'; ?>
       <h5>  You are signed in as <font color="red">Student </font>  </h5>
   </div>
   <br><br>
   <div class="container">
       <h1>Request Course Drop</h1>
     <hr/>

   </div>
   <br>
   <div class="container">
       <?php
       $falsemsg="";
       $truemsg="";
       $connection=mysqli_connect('localhost','root','','red_academy');
       $email= $_SESSION['email'];

       $query="select * from courseinfo where stdemail='$email'";
       $result=mysqli_query($connection,$query);

           if($result)
              {
                if(mysqli_num_rows($result)>0)
                    {
                      echo'<div class="row">';
                      while($ans=mysqli_fetch_array($result))
                        {
                                      $cname=$ans['coursename'];
                                      echo'<div class="col-md-4"><div class="card"><div class="cardcontainer">';
                                      $query2="select teacher, teacher_email, routine, start, end from courses where coursename='$cname'";
                                      $result2=mysqli_query($connection,$query2);
                                      $ans2=mysqli_fetch_array($result2);
                                      $teacher=$ans2['teacher'];
                                      $teacher_email=$ans2['teacher_email'];
                                      $routine=$ans2['routine'];
                                      $start=$ans2['start'];
                                      $end=$ans2['end'];
                                      $drop_req=$ans['drop_req'];
                                      echo'<b><h1><font style="font-family:algerian;" color="#7A1414">'.$ans['coursename'].'</font></h1></b><hr/>';
                                      echo'<b>By,</b> '.$teacher.'<br>';
                                      echo'<b>Routine:</b> '.$routine.'<br>';
                                      echo'<b>Start Time:</b> '.$start.'<br>';
                                      echo'<b>End Time:</b> '.$end.'<br>';
                                      echo'<b>Drop Request:</b> '.$drop_req.'<br>';
                                      echo'<form class="drop_c" method="POST" action="">
                                      <input type="hidden" name="drop_course" value="PENDING">
                                      <input type="hidden" name="course" value="'.$cname.'"><br>
                                      <input type="submit" class="btn btn-primary btn-block" value="Request Drop Course">
                                      </form>';
                                      if($_SERVER["REQUEST_METHOD"] == "POST")
                                      {
                                        $req=mysqli_real_escape_string($connection, $_POST['drop_course']);
                                        $req_course=mysqli_real_escape_string($connection, $_POST['course']);
                                        $query3="update courseinfo set drop_req='$req' where stdemail='$email' and coursename='$req_course'";
                                        $result3=mysqli_query($connection, $query3);
                                        $truemsg= '<br> <b><font color="green"> Course drop Request has been sent Successfully </font></b>';
                                      }
                                      echo'</div></div><br><br></div>';

                        }
                        echo'</div>';
                    }
                    if($truemsg!="")
                    {
                      echo $truemsg;
                    }
                    else {
                      // code...
                    }
                }
          else
          {
               echo "Nothing to show Here <br>";
          }





                          ?>


                      </div>
                      <script>
  										$(document).ready(function(){
  											$('.drop_c').on('submit', function(){
  												if(confirm("Are You sure want to drop this course?"))
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
