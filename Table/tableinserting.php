<?php
  $lecture=filter_input(INPUT_POST,'lecture');
  $Monday=filter_input(INPUT_POST,'Monday');
  $Tuesday=filter_input(INPUT_POST,'Tuesday');
  $Wednesday=filter_input(INPUT_POST,'Wednesday');
  $Thursday=filter_input(INPUT_POST,'Thursday');
  $Friday=filter_input(INPUT_POST,'Friday');
  $Saturday=filter_input(INPUT_POST,'Saturday');
  date_default_timezone_set('Asia/Kolkata');
  $currentDate=date('Y-m-d h:i:s');
  $start_Time=filter_input(INPUT_POST,'start_Time');
  $end_Time=filter_input(INPUT_POST,'end_Time');
          $host="localhost";
          $dbusername="root";
          $dbpassword="";
          $dbport="3306";
          $dbname="animal";
          $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
      if(mysqli_connect_errno()){
          die('Connect Error ('.mysqli_connect_errno().')'
          .mysqli_connect_error());
      }
      else{
          $sql="INSERT INTO lecture_table(lecture,start_Time,end_Time,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Createddate)values('$lecture','$start_Time','$end_Time','$Monday','$Tuesday','$Wednesday','$Thursday','$Friday','$Saturday','$currentDate')";
          if($conn->query($sql)){
            header("Location:/table.php");
            }
        else{
          echo "Error:".$sql."<br>".$conn->error;
         }
        }
        $conn->close();
?>