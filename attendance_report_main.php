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
  require_once __DIR__ . '\mpdf\live\vendor\autoload.php';
  $mpdf= new \Mpdf\Mpdf();
  $data.='<img src="photos/logo.png" height="75" class="d-inline-block" alt="Business"> <h2><b><font color="red"> RED </font> ACADEMY </b></h2>';
  $data.='<br><br><div class="container">';
  $data.='<b> <h2> Attendance Report </h2> </b><hr/>';
  $data.='</div>';
  $data.='<div class="container">';
  $data.= '<b>Student Name:</b> '.$_SESSION['fname'].' '.$_SESSION['lname'].'<br>';
  $data.='<b>Student Email:</b> '.$_SESSION['email'].'<br>';
  $data.='</div>';
  $data.='<br><br>';
  $data.='<div class="container">';
  $data.= '<h3> <b>Course-wise Attendance Record (All time)</b> </h3>';
     $connection=mysqli_connect('localhost', 'root', '','red_academy');
     $stdname= $_SESSION['fname'].' '.$_SESSION['lname'];
     $stdemail=$_SESSION['email'];
     $query="select coursename, routine from courseinfo where stdemail='$stdemail'";
     $result=mysqli_query($connection, $query);
     $query2="select coursename, att_time, att_date, attendance from attendance where stdemail='$stdemail'";
     $result2=mysqli_query($connection, $query2);
     $total_att=mysqli_num_rows($result2);

     if($result)
     {
     if(mysqli_num_rows($result)>0){
                     $data.= '<table class="table" border="1" cellpadding="10px">
                         <tr>
                             <th>
                                 Course Name
                             </th>
                             <th>
                                 Routine
                             </th>
                             <th>
                                 Attendance
                             </th>
                         </tr>
                         ';
       while($ans=mysqli_fetch_array($result))
       {
                        $get_course=$ans['coursename'];
                        $query3="select attendance from attendance where coursename='$get_course' and stdemail='$stdemail'";
                        $result3=mysqli_query($connection, $query3);
                        $count=mysqli_num_rows($result3);
                         $data.="<tr>";
                                     $data.= "<td>".$ans['coursename']."</td>";
                                     $data.= "<td>".$ans['routine']."</td>";
                                     $data.= "<td>". $count ." day(s)</td>";
                         $data.= "</tr>";
         }

                   $data.= "</table>";


       }
       }
       else {
         $data.= "Nothing to show Here <br>";
       }



     if($_SERVER["REQUEST_METHOD"] == "POST")
     {

       $conn=mysqli_connect('localhost', 'root', '','red_academy');
       $main_query="select enroll_date from courseinfo where stdemail='$stdemail'";
       $main_res=mysqli_query($conn, $main_query);
       $main_ans=mysqli_fetch_array($main_res);
       $enroll_date=$main_ans['enroll_date'];

       if($_POST['start_date']<$enroll_date)
       {
          $data.='<br> <b> <font color="red"> You cannot select a Start Date which is before the day of enrollment of your first course </font> </b> <br> <a href="attendance_reports.php"> Try Again </a> <br>';
       }
       else
       {
         $s_name= $_SESSION['fname'].' '.$_SESSION['lname'];
         $s_email=$_SESSION['email'];
         $s_date= mysqli_real_escape_string($conn, $_POST['start_date']);
         $e_date= mysqli_real_escape_string($conn, $_POST['end_date']);
         $q="select * from attendance where stdemail='$stdemail' and att_date>='$s_date' and att_date<='$e_date'";
         $res=mysqli_query($conn, $q);
         $att_count= mysqli_num_rows($res);
         //$seconds= strtotime($e_date) -strtotime($s_date);
         //$days= abs(round($seconds/86400));
         //echo $days.'<br>';
         $start=strtotime($s_date);
         $end=strtotime($e_date);
         $st=0;
         $mw=0;
         $tr=0;
         $sr=0;
         $fa=0;
         $pdate=date('Y-m-d');
         if($e_date==$pdate)
         {
           $total=1;
         }
         else
         {
           $total=0;
         }
         $start=$start-86400;
         while($start!=$end)
         {
           $day=date('l', $start);
           $query2="select coursename, routine from courseinfo where stdemail='$s_email'";
           $result2=mysqli_query($connection,$query2);
               if($result2)
                  {
                    if(mysqli_num_rows($result2)>0)
                        {
                          while($ans2=mysqli_fetch_array($result2))
                            {

                                          $cname=$ans2['coursename'];
                                          $routine=$ans2['routine'];
                                          if($routine=='ST')
                                          {
                                            $day1='Sunday';
                                            $day2='Tuesday';
                                            if($day==$day1 || $day==$day2)
                                            {
                                              $st++;

                                            }
                                          }
                                          if($routine=='MW')
                                          {
                                            $day1='Monday';
                                            $day2='Wednesday';
                                            if($day==$day1 || $day==$day2)
                                            {
                                              $mw++;

                                            }
                                          }
                                          if($routine=='TR')
                                          {
                                            $day1='Tuesday';
                                            $day2='Thursday';
                                            if($day==$day1 || $day==$day2)
                                            {
                                              $tr++;

                                            }
                                          }
                                          if($routine=='SR')
                                          {
                                            $day1='Sunday';
                                            $day2='Thursday';
                                            if($day==$day1 || $day==$day2)
                                            {
                                              $sr++;

                                            }
                                          }
                                          if($routine=='FA')
                                          {
                                            $day1='Friday';
                                            $day2='Saturday';
                                            if($day==$day1 || $day==$day2)
                                            {
                                              $fa++;

                                            }

                                          }
                            }

                        }
                    }
              else
              {
                   $data.= "Nothing to show Here <br>";
              }
           $start=$start+86400;

         }
         $total=$st+$mw+$tr+$sr+$fa;

         $data.='<br> Your Total Attendance= <b>'.$total_att.'</b> (From the beginning)';
         $data.='<br> Your Total Attendance from <b>'.$s_date.'</b> to <b>'.$e_date.'</b> (yyyy-mm-dd)= <b>'.$att_count.'</b> ';
         $data.='<br> Total Number of Classes from <b>'.$s_date.'</b> to <b>'.$e_date.'</b> (yyyy-mm-dd)= <b>'.$total.'</b> ';
         $att_score= ($att_count/$total)*100;
         $data.='<br> Your Attendance Score in given duration: <b>'.round($att_score, 2).'%</b><br> <br> <br>';

         $data.='<h4> Additional Report:</h4>';
         $data.='Total Number of Classes of your <b>Sunday & Tuesday (ST)</b> Courses= <b>'.$st.'</b> <br>';
         $data.='Total Number of Classes of your <b>Monday & Wednesday (MW)</b> Courses= <b>'.$mw.'</b> <br>';
         $data.='Total Number of Classes of your <b>Tuesday & Thursday (TR)</b> Courses= <b>'.$tr.'</b> <br>';
         $data.='Total Number of Classes of your <b>Sunday & Thursday (SR) </b>Courses= <b>'.$sr.'</b> <br>';
         $data.='Total Number of Classes of your <b>Friday & Saturday (FA)</b> Courses= <b>'.$fa.'</b> <br>';


       }


     }
     $mpdf->writeHTML($data);

     $mpdf->Output('attendance.pdf','D');

     ?>
