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
  $start_Time=$_POST['start_Time'];
  $end_Time=$_POST['end_Time'];
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
          $sql="UPDATE lecture_table SET lecture='{$lecture}',Monday='{$Monday}',Tuesday='{$Tuesday}',Wednesday='{$Wednesday}',Thursday='{$Thursday}',Friday='{$Friday}',Saturday='{$Saturday}',
          start_Time='{$start_Time}',end_Time='{$end_Time}' where lecture={$lecture}";
          $result=mysqli_query($conn,$sql);
          if($conn->query($sql)){
            header("Location:/table.php");
            }
        else{
          echo "Error:".$sql."<br>".$conn->error;
         }
        }
        $conn->close();
?>