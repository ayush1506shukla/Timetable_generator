<?php
$con=mysqli_connect("localhost","root","","animal");

if(!$con){
    die("Connection Error");
}
$query="select * from faculty";
$result=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Faculty Members</title>
</head>
<body>
    <div class="container">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                        <h2 class="display-6 text-center">Faculty Members</h2>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                           <td class="bg-dark text-white">User ID</td>
                           <td class="bg-dark text-white">First Name</td>
                           <td class="bg-dark text-white">Last Name</td>
                           <td class="bg-dark text-white">Email</td>
                           <td class="bg-dark text-white">DOJ</td>
                           <td class="bg-dark text-white">Course</td>
                           <td class="bg-dark text-white">Contact</td>
                        </tr>
                        <tr>
                           <?php
                               while($row=mysqli_fetch_assoc($result))
                               {
                             ?>
                             <td><?php echo $row['fac_id']; ?></td>
                             <td><?php echo $row['f_name']; ?></td>
                             <td><?php echo $row['l_name']; ?></td>
                             <td><?php echo $row['e_mail']; ?></td>
                             <td><?php echo $row['doj'];    ?></td>
                             <td><?php echo $row['course']; ?></td>
                             <td><?php echo $row['contact']; ?></td>
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