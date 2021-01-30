
<?php
  session_start();
  $cookie_name = 'email';
  if(isset($_COOKIE[$cookie_name]))
  {
    echo 'Account information is saved --> '.$_COOKIE[$cookie_name];
  }
  else
  {
    echo 'Account is not saved';
  }
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
    <title>Red Academy| Teacher Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
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
     <?php echo '<h4> Hello, '.$_SESSION['fname'].' '.$_SESSION['lname'].'</h4>'; ?>
       <h4> You are Signed in as a <font color="green"> Teacher </font> </h4>
   </div>
   <br><br><br>
   <div class="container">
     <div class="middle">
       <h2> <b> Choose Action </b> </h2><hr/>
     </div>
   </div>
   <br>
   <div class="container">
     <div class="row">
         <div class="middle">
          <a href="teacher_manage_courses.php">  <img src="photos/courses.png" alt="Manage Courses" height="100"></a>
            <h3><a href="teacher_manage_courses.php">My Courses</a></h3>
        </div>
     </div>
   </div>
   <br> <br> <br>
  </body>

  <footer>
    <div class="container">
      <div class="middle">
        <p>Abdullah Muhammad Tahir &copy;2020</p>

      </div>

    </div>
  </footer>
</html>
