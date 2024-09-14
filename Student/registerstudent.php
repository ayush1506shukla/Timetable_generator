<?php
  $Firstname=filter_input(INPUT_POST,'Firstname');
  $Lastname=filter_input(INPUT_POST,'Lastname');
  $Dob=filter_input(INPUT_POST,'Dob');
  $Department=filter_input(INPUT_POST,'Department');
  $Roll_No=filter_input(INPUT_POST,'Roll_No');
  $Email=filter_input(INPUT_POST,'Email');
  $Contact=filter_input(INPUT_POST,'Contact');
  $username=filter_input(INPUT_POST,'username');
  $password=filter_input(INPUT_POST,'password');
  date_default_timezone_set('Asia/Kolkata');
  $currentDate=date('Y-m-d H:i:s');
  if(!empty($username)){
      if(!empty($password)){
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
          $sql="INSERT INTO student(user,pass,Created_Date,Firstname,Lastname,Dob,Department,Roll_No,Contact,Email)values
          ('$username','$password','$currentDate','$Firstname','$Lastname','$Dob','$Department','$Roll_No','$Contact','$Email')";
          if($conn->query($sql)){
              echo"<script>alert('New record is inserted sucessfully');
              window.location.href='loginStudent.html'</script>";
             
          }
          else{
              echo "Error:".$sql."<br>".$conn->error;
          }
          $conn->close();
      }
      }
      else{
          echo "password should not be empty";
          die();
      }
  }
  else{
      echo "Username should not be empty";
      die();
  }
  ?>