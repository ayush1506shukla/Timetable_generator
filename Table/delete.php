<?php
$lecture=$_GET['lc'];
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
        $sql="DELETE FROM lecture_table WHERE lecture={$lecture}";
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