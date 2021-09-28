<?php
    include("conn.php");
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `students`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `result`"));
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Admin Dashboard</title>
    <style>
        .main{
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 5% ;
        }
    </style>
</head>
<body>
        
  <div class="title ">
    <center><div class="heading">Admin Dashboard </div></center>
    <div class="logo"> Logout
      <a href="logout.php"><i class="fas fa-sign-out-alt" style="color: rgba(59, 58, 58, 0.877); margin-left: 10px" ></i></a>
    </div>
  </div>
  <div >
    <ul>
      <li class="dropdown" onclick="toggleDisplay('1')">
      <center><a href="" class="dropbtn">CLASSES &nbsp
          <span class="fa fa-angle-down"></span>
        </a></center>
        <div class="dropdown-content" id="1">
          <a href="classes_add.php">Add New Class</a>
          <a href="classes_view.php">View Registered Classes</a>
        </div>
      </li>
      <li class="dropdown" onclick="toggleDisplay('2')">
      <center> <a href="#" class="dropbtn">STUDENTS &nbsp
          <span class="fa fa-angle-down"></span>
        </a></center>
        <div class="dropdown-content" id="2">
          <a href="students_add.php">Add New Students</a>
          <a href="students_view.php">View Registered Students</a>
        </div>
      </li>
      <center><li class="dropdown" onclick="toggleDisplay('3')">
      <a href="#" class="dropbtn">RESULTS &nbsp
          <span class="fa fa-angle-down"></span>
        </a>
        <div class="dropdown-content" id="3">
          <a href="results_add.php">Add New Results</a>
          <a href="results_update.php">Update Results</a>
        </div></center>
      </li>
    </ul>
  </div>
  <div class="main">
  <center><h2>Student Results Management System</h2></center>
        <p> Admin can Add new classes and View the classes registered.</p>
        <br>
        <p>Check the dropdown of <span class="span_text1">CLASSES</span> for further information.</p>
        <br>
        <p> Admin can Add new students and View the students who registered in diffent classes.</p>
        <br>
        <p>Check the dropdown of <span class="span_text1">STUDENTS</span> for further information.</p>
        <br>
        <p> Admin can Enter fresh results and Update the already entered results of a certain student whose results has already been entered.</p>
        <br>
        <p>Check the dropdown of <span class="span_text1">RESULTS</span> for further information.</p>
    <br><br><br>
    <h2> Summary of the Classes, Students and their Results Entered</h2>
    <?php
      echo '<p>The total number of Active Classes registered &emsp;&emsp;<span class="span_text">'.$no_of_classes[0].'</span></p>';
      echo '<p>The total number of Students attending different classes &emsp;&emsp;<span class="span_text">'.$no_of_students[0].'</span></p>';
      echo '<p>The total number of students whose results have been entered and/or updated &emsp;&emsp;<span class="span_text">'.$no_of_result[0].'</span></p>';
    ?>
  </div>
</body>
</html>

<?php
   include('session.php');
?>