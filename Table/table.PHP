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
      text-align: center;
      position: relative;
      left:45%;
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
<h1 class="display-6 text-center">Time Table</h1>
<form id="form" action="tableinserting.php" method="post">
  <div class="container text-center">
  <b>Time:-</b><input type="time" id="time1" name="start_Time">-<input type="time" id="time2" name="end_Time">
  <br>
  <b>lecture:-</b><input type="number" name="lecture" value="lecture"></input>
  <br>
  <b>Monday lecture:-</b><input type="text" id="lecture1" name="Monday"></input>
  <br>
  <b>Tuesday lecture:-</b><input type="text" id="lecture1" name="Tuesday"></input>
  <br>
  <b>Wednesday lecture:-</b><input type="text" id="lecture1" name="Wednesday"></input>
  <br>
  <b>Thursday lecture:-</b><input type="text" id="lecture1" name="Thursday"></input>
  <br>
  <b>Friday lecture:-</b><input type="text" id="lecture1" name="Friday"></input>
  <br>
  <b>Saturday lecture:-</b><input type="text" id="lecture1" name="Saturday"></input>
  <br>
  <br>
  <button type="submit" id="add">Add to list</button>
  </div>
  <?php
$con=mysqli_connect("localhost","root","","animal");

if(!$con){
    die("Connection Error");
}
$query="select * from lecture_table";
$result=mysqli_query($con,$query);
?>
    <div class="container">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                        <h2 class="display-6 text-center">Timetable</h2>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                           <td class="bg-dark text-white">lecture</td>
                           <td class="bg-dark text-white">Time</td>
                           <td class="bg-dark text-white">Monday</td>
                           <td class="bg-dark text-white">Tuesday</td>
                           <td class="bg-dark text-white">Wednesday</td>
                           <td class="bg-dark text-white">Thursday</td>
                           <td class="bg-dark text-white">Friday</td>
                           <td class="bg-dark text-white">Saturday</td>
                           <td class="bg-dark text-white" colspan="2" align="center">Action</td>
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
                             <td class="btn btn-success text-white"><a href='update.php? le=<?php echo $row['lecture'];?>&st=<?php echo $row['start_Time']?>&et=<?php echo $row['end_Time'];?>&
                             Mo=<?php echo $row['Monday']; ?>&Tu=<?php echo $row['Tuesday']; ?>&We=<?php echo $row['Wednesday'];?>&
                             Th=<?php echo $row['Thursday'];?>&Fi=<?php echo $row['Friday'];?>&Sa=<?php echo $row['Saturday'];?>'>Edit</a></td>
                            <td class="btn btn-danger"><a href='delete.php?lc=<?php echo $row['lecture']; ?>'>Delete</a></td>
                            </tr>
                            <?php
                               }
                            ?>
                        
                    </table>
               </div>
            </div>
        </div>
    
</body>
  <!--<button id="clear" onclick="clearstorage()">Clear List</button>
</form>
  <div id="items" style="text-align: center;">
   <h2>MCA</h2>
   <div id="table">
   <table style="margin-left: auto;margin-right: auto;">
       <thead >
         <tr>
           <th scope="col">Sr.No.</th>
           <th scope="col">Time</th>
           <th scope="col">Monday</th>
           <th scope="col">Tuesday</th>
           <th scope="col">Wedneday</th>
           <th scope="col">Thursday</th>
           <th scope="col">Friday</th>
           <th scope="col">Saturday</th>
           <th scope="col">Actions</th> 
         </tr>
       </thead>
       <tbody id="tableBody">
         <tr>
           <td scope="row">1</td>
           <td>8pm-9pm</td>
           <td>Hindi</td>
           <td>Hindi</td>
           <td>English</td> 
           <td>English</td>
           <td>Math</td>
           <td>Science</td>
           <td><button onclick="deleted()">Delete</button></td> 
         </tr>
         </tbody>
     </table>
    </div>
   <br>
   <button id="print" onclick="printarea('items')">Print</button>
   <br>
</div>
</form>
</div>
</body>-->
<script>
     /*function getAndUpdate(){
                console.log("Updating List...");
                tim1 = document.getElementById('time1').value;
                tim2 = document.getElementById('time2').value;
                lec1 = document.getElementById('lecture1').value;
                lec2 = document.getElementById('lecture2').value;
                lec3 = document.getElementById('lecture3').value;
                lec4 = document.getElementById('lecture4').value;
                lec5 = document.getElementById('lecture5').value;
                lec6 = document.getElementById('lecture6').value;
                if (localStorage.getItem('itemsJson')==null){
                    itemJsonArray = [];
                    itemJsonArray.push([tim1,tim2,lec1,lec2,lec3,lec4,lec5,lec6]);
                    localStorage.setItem('itemsJson',JSON.stringify(itemJsonArray))
                }
                else{
                    itemJsonArrayStr = localStorage.getItem('itemsJson')
                    itemJsonArray = JSON.parse(itemJsonArrayStr);
                    itemJsonArray.push([tim1,tim2,lec1,lec2,lec3,lec4,lec5,lec6]);
                    localStorage.setItem('itemsJson', JSON.stringify(itemJsonArray))
                }
                update();
            }
            function update(){
                if (localStorage.getItem('itemsJson')==null){
                    itemJsonArray = []; 
                    localStorage.setItem('itemsJson', JSON.stringify(itemJsonArray))
                } 
                else{
                    itemJsonArrayStr = localStorage.getItem('itemsJson')
                    itemJsonArray = JSON.parse(itemJsonArrayStr); 
                }
                let tableBody = document.getElementById("tableBody");
                let str = "";
                itemJsonArray.forEach((element, index) => {
                    str += `
                    <tr>
                    <th scope="row">${index+1}</th>
                    <td>${element[0]}-${element[1]}</td>
                    <td>${element[2]}</td>
                    <td>${element[3]}</td>
                    <td>${element[4]}</td>
                    <td>${element[5]}</td>
                    <td>${element[6]}</td>
                    <td>${element[7]}</td>
                    <td><button onclick="deleted(${index})">Delete</button></td> 
                    </tr>`; 
                });
                tableBody.innerHTML = str;
            }
            add = document.getElementById("add");
            add.addEventListener("click", getAndUpdate);
            update();
            function deleted(itemIndex){
                console.log("Delete", itemIndex);
                itemJsonArrayStr = localStorage.getItem('itemsJson')
                itemJsonArray = JSON.parse(itemJsonArrayStr);
                itemJsonArray.splice(itemIndex, 1);
                localStorage.setItem('itemsJson', JSON.stringify(itemJsonArray));
                update();

            }
            function clearstorage(){
                if (confirm("Do you really want to clear?")){
                console.log('Clearing the storage')
                localStorage.clear();
                update();
                }
            }
            function printarea(areaID){
              var printContent=document.getElementById(areaID).innerHTML;
              var originalContent=document.body.innerHTML;
              document.body.innerHTML=printContent;
              window.print();
              document.body.innerHTML=originalContent;
            }*/
</script>
</html>