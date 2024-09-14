<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>table</title>
</head>

<?php
$con=mysqli_connect("localhost","root","","animal");

if(!$con){
    die("Connection Error");
}
$query="select * from lecture_table";
$result=mysqli_query($con,$query);
?>
            <div class="row mt-5">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                        <h2 class="display-6 text-center">Timetable</h2>
                    </div>
                    <div class="card-body">
                    <table id="items" class="table table-bordered text-center">
                        <tr>
                           <td class="bg-dark text-white">lecture</td>
                           <td class="bg-dark text-white">Time</td>
                           <td class="bg-dark text-white">Monday</td>
                           <td class="bg-dark text-white">Tuesday</td>
                           <td class="bg-dark text-white">Wednesday</td>
                           <td class="bg-dark text-white">Thursday</td>
                           <td class="bg-dark text-white">Friday</td>
                           <td class="bg-dark text-white">Saturday</td>
                        </tr>
                        <tr>
                           <?php
                               while($row=mysqli_fetch_assoc($result))
                               {
                             ?>
                             <td><?php echo $row['lecture']; ?></td>
                             <td><?php echo $row['start_Time'].'-'.$row['end_Time'];?></td>
                             <td><?php echo $row['Monday']; ?></td>
                             <td><?php echo $row['Tuesday']; ?></td>
                             <td><?php echo $row['Wednesday'];?></td>
                             <td><?php echo $row['Thursday']; ?></td>
                             <td><?php echo $row['Friday']; ?></td>
                             <td><?php echo $row['Saturday']; ?></td>
                            </tr>
                            <?php
                               }
                            ?>
                        
                    </table>
                    <button id="print" onclick="printPage()">Print</button>
                    <?php
                      echo'
                            <script>function printPage(){
                              window.print();
                             }
                            </script>'
                    ?>
               </div>