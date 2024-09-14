<?php
$con=mysqli_connect("localhost","root","","animal");
if(!$con){
    die("Connection Error");
}

$lecture=$_GET['le'];
$query="select * from lecture_table where lecture={$lecture}";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
     while($row=mysqli_fetch_assoc($result)){

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>table</title>
</head>
<style>
    .title{
        text-align: center;
      }
    b{
      display: flex;
      justify-content: space-between;
      }
    [type="time"]{
        border-radius:0.5em;
      }
    [type="text"]{
            border-radius:0.5em;
      }
    button{
        background-color: black;
        color: white;
    }
    #table{
        text-align: center;
    }
    table,td,th{
        border:0.1rem solid black;
        border-collapse: collapse;
    }
    th{
        border:0.1rem solid black;
        color:black;
        height:3em;
        width:6em;
        font-size: larger;
        border:collapse;
    }
</style>
<body>
<h1 class="title">Time Table</h1>
<form id="form" action="editupdate.php" method="post">
  <b>Time:-</b><input type="time" id="time1" name="start_Time" value="<?php echo $row['start_Time'];?>">-<input type="time" id="time2" name="end_Time" value="<?php echo $row['end_Time'];?>">
  <br>
  <b>lecture:-</b><input type="number" name="lecture" value="<?php echo $row['lecture'];?>"></input>
  <br>
  <b>Monday lecture:-</b><input type="text" id="lecture1" name="Monday" value="<?php echo $row['Monday'];?>"></input>
  <br>
  <b>Tuesday lecture:-</b><input type="text" id="lecture1" name="Tuesday" value="<?php echo $row['Tuesday'];?>"></input>
  <br>
  <b>Wednesday lecture:-</b><input type="text" id="lecture1" name="Wednesday" value="<?php echo $row['Wednesday'];?>"></input>
  <br>
  <b>Thursday lecture:-</b><input type="text" id="lecture1" name="Thursday" value="<?php echo $row['Thursday'];?>"></input>
  <br>
  <b>Friday lecture:-</b><input type="text" id="lecture1" name="Friday" value="<?php echo $row['Friday'];?>"></input>
  <br>
  <b>Saturday lecture:-</b><input type="text" id="lecture1" name="Saturday" value="<?php echo $row['Saturday'];?>"></input>
  <br>
  <br>
  <button type="submit" id="add">Update</button>
<?php
 }
}
?>