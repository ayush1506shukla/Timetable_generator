<?php
                $host="localhost";
                $dbusername="root";
                $dbpassword="";
                $dbport="3306";
                $dbname="animal";
        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        
        $query = "SELECT * FROM faculty WHERE username='$username' AND f_password='$password'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            echo "<script> alert('Login successful!');
            window.location.href='facultymainpage.html'</script>";
        } else {
            echo "<script>alert('Login failed. Please check your username and password');
            window.location.href='loginfaculty.html'</script>";
        }
        $conn->close();
        ?>