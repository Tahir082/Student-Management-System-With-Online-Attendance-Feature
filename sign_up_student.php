<?php
    session_start();
  $connection=mysqli_connect('localhost','root','','red_academy');
    if(isset($_POST['submit']))
    {

    $fname=mysqli_real_escape_string($connection,$_POST['fname']);
    $lname=mysqli_real_escape_string($connection,$_POST['lname']);
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $dob=mysqli_real_escape_string($connection,$_POST['dob']);
    $contact=mysqli_real_escape_string($connection,$_POST['contact']);
    $interest=mysqli_real_escape_string($connection,$_POST['interest']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $c_password=mysqli_real_escape_string($connection,$_POST['c_password']);
    $query="SELECT * FROM users where email='".$email."'";
    $result = mysqli_query($connection,$query);
    $num_rows = mysqli_num_rows($result);
    if($num_rows >= 1){
        echo '<b><font color="red">Email Already Exists</font></b>';
      }
    else {
      if($password==$c_password)
      {
        $insert= "insert into users values('$fname','$lname','$email','$password','$dob','$interest','$contact')";
        if(mysqli_query($connection, $insert))
        {
          $_SESSION['fname'] = $fname;
          $_SESSION['lname']= $lname;
          $_SESSION['email']= $email;

          header('location: homepage.php');

        }
        else
        {
          echo "Something is missing or bad connection. $insert. " . mysqli_error($connection);
        }
      }
      else
      {
        echo '<b><font color="red"> Password and Confirmed Password did not match</font> </b>';
      }
    }



// Close connection
    }
    mysqli_close($connection);
 ?>

<html>
    <head>
        <title>Red Academy|Sign Up</title>
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
     <br><br>
     <div class="container">
       <div class="middle">
         <h4> <b>Already have an account?</b> </h4>
         <a href="sign_in_student.php"><button class="custom_btn"> <b> Sign In </b> </button></a>
       </div>
     </div>
     <br><br>

        <div class="container">
            <div>
                <center><h2><b>Or, Sign Up as a Student</b></h2><hr/></center>
		               <div class="content">
                      <form class="form-group" method="POST" action="">
                          <div class="row">
                              <div class="col-md-4">
                                  <label>First Name:
                                  <input type="text" name="fname" class="form-control"  placeholder="First Name" required>
                                  </label>
                              </div>
                              <div class="col-md-4">
                                <label>Last Name:
                                <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                                </label>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-4">
                                <label>Email:
                                <input type="text" name="email" class="form-control" placeholder="Enter email" required>
                                </label>
                              </div>
                              <div class="col-md-4">
                                <label>Password:
                                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                </label>
                              </div>
                              <div class="col-md-4">
                                <label>Confirm Password:
                                <input type="password" name="c_password" class="form-control" placeholder="Confirm password">
                                </label>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-4">
                                <label>Date of Birth:
                                <input type="date" name="dob" class="form-control" placeholder="Enter date of birth" required>
                                </label>
                              </div>
                              <div class="col-md-4">
                                <label>Contact:
                                <input type="contact" name="contact" class="form-control" placeholder="Enter Contact Number" required>
                                </label>
                              </div>
                              <div class="col-md-4">
                                <label>Interest:
                                <input type="text" name="interest" class="form-control" placeholder="What brings you here?">
                                </label>
                              </div>
                            </div>
                            <br>
                            <input type="submit" name="submit" value="Sign Up Now" class="btn btn-primary btn-block">
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
