<?php
$con=mysqli_connect("localhost","root","","animal");

if(!$con){
    die("Connection Error");
}
$query="select * from student";
$result=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Students</title>
</head>
<body>
    <div class="container">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                        <h2 class="display-6 text-center">Students</h2>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                           <td class="bg-dark text-white">User ID</td>
                           <td class="bg-dark text-white">First Name</td>
                           <td class="bg-dark text-white">Last Name</td>
                           <td class="bg-dark text-white">Date of Birth</td>
                           <td class="bg-dark text-white">Department</td>
                           <td class="bg-dark text-white">RollNo</td>
                           <td class="bg-dark text-white">Email</td>
                           <td class="bg-dark text-white">Contact</td>
                        </tr>
                        <tr>
                           <?php
                               while($row=mysqli_fetch_assoc($result))
                               {
                             ?>
                             <td><?php echo $row['id']; ?></td>
                             <td><?php echo $row['Firstname']; ?></td>
                             <td><?php echo $row['Lastname']; ?></td>
                             <td><?php echo $row['Dob']; ?></td>
                             <td><?php echo $row['Department'];?></td>
                             <td><?php echo $row['Roll_No']; ?></td>
                             <td><?php echo $row['Email']; ?></td>
                             <td><?php echo $row['Contact']; ?></td>
                            </tr>
                            <?php
                               }
                            ?>
                        
                    </table>
               </div>
            </div>
        </div>
    
</body>
</html>