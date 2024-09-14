<?php
  $username=filter_input(INPUT_POST,'username');
  $password=filter_input(INPUT_POST,'password');
  $f_name=filter_input(INPUT_POST,'firstName');
  $l_name=filter_input(INPUT_POST,'lastName');
  $address=filter_input(INPUT_POST,'address');
  $contact=filter_input(INPUT_POST,'contact');
  $dob=filter_input(INPUT_POST,'dob');
  $doj=filter_input(INPUT_POST,'doj');
  $qualification=filter_input(INPUT_POST,'qualification');
  $e_mail=filter_input(INPUT_POST,'email');
  $course=filter_input(INPUT_POST,'course');
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
          $sql="INSERT INTO faculty(username,f_password,f_name,l_name,f_address,contact,dob,doj,qualification,e_mail,course) 
          values('$username','$password','$f_name','$l_name','$address','$contact','$dob','$doj','$qualification','$e_mail','$course')";
          if($conn->query($sql)){
            echo"<script>alert('New record is inserted sucessfully');
            window.location.href='loginfaculty.html'</script>";
          }
          else{
            echo "Username is already Exist";
           }
      }
?>