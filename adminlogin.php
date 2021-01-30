<?php
   session_start();
   $connection=mysqli_connect('localhost','root','','red_academy');

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $email = mysqli_real_escape_string($connection,$_POST['email']);
      $password = mysqli_real_escape_string($connection,$_POST['password']);

      $query = "SELECT name, email FROM admin WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($connection,$query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $email and $password, table row must be 1 row

      if($count == 1)
      {
        $_SESSION['name'] = $row["name"];
        $_SESSION['email']=$row["email"];
        $remember=$_POST['remember'];
        if(isset($_POST['remember']))
        {
          setcookie('email', $email, time()+60*60*30);
        }
         header('location: admin_homepage.php');
      }
      else {
         echo"Your Login Name or Password is invalid";
      }
   }
?>

<html>
    <head>
        <title>Red Academy|Admin Log In</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="jquery-3.5.1.slim.min.js"></script>
        <script src="popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="photos/logo.png" height="75" class="d-inline-block" alt="Business"> <b><font color="red"> RED </font> ACADEMY </b>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto">

               <li class="nav-item active">
                 <a class="nav-link" href="index.php"> Home
                   <span class="sr-only">(current)</span>
                 </a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="about.php">About</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="contact.php">Contact</a>
               </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class='fas fa-user-alt'></i>
                       USER
                   </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item" href="sign_in_student.php">Student Sign In </a>
                       <a class="dropdown-item" href="sign_in_teacher.php">Teacher Sign In</a>

                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="sign_up_student.php">Student Sign Up </a>
                       <a class="dropdown-item" href="sign_up_teacher.php">Teacher Sign Up</a>
                   </div>
               </li>
             </ul>
           </div>
       </div>
     </nav>

        <div class="container">
            <div>
                <center><h2><b>Admin Login In</b></h2></center>
                <br>
                <br>
		               <div class="content">
                      <form class="form-group" action="" method="POST">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Email:
                                <input type="text" name="email" class="form-control" placeholder="Enter email">
                                </label>
                              </div>
                              <div class="col-md-4">
                                <label>Password:
                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                                </label>
                              </div>
                            </div>
                            <div>
                              <input type="checkbox" name="remember" id="remember"/> <label for="remember-me">Remember me</label>
                            </div>
                            <br>
                            <input type="submit" name="submit" value="Sign In" class="btn btn-primary btn-block">
                    </form>
                </div>
              </div>
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
