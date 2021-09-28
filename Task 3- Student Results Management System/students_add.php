<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/form1.css" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Add New Student</title>
</head>
<body>
        
<div class="title">
    <div class="heading">Add New Student</div>
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
          <a href="add_results.php">Add New Results</a>
          <a href="results_update.php">Update Results</a>
        </div></center>
      </li>
    </ul>
  </div>
  <div class="main" style="width: 70%; margin: 0 auto; padding: 5%">
    <form action="" method="post">
      <legend>Add New Student</legend>
      
      <?php
        include('conn.php');
        include('session.php');
        
        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
            echo '<select name="class_name">';
            echo '<option selected disabled>Select Student\'s Class</option>';
        while($row = mysqli_fetch_array($class_result)){
            $display=$row['name'];
            echo '<option value="'.$display.'">'.$display.'</option>';
        }
        echo'</select>'
      ?>
      <input type="text" name="student_name" placeholder="Student Name">
      <input type="text" name="roll_no" placeholder="Roll No">
      <input type="submit" value="ADD STUDENT DETAILS">
    </form>
  </div>
</body>
</html>

<?php

  if(isset($_POST['student_name'],$_POST['roll_no'])) {
      $name=$_POST['student_name'];
      $rno=$_POST['roll_no'];
      if(!isset($_POST['class_name']))
          $class_name=null;
      else
          $class_name=$_POST['class_name'];

      // validation
      if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
          if(empty($name))
              echo '<p class="error">Please Enter Student Name</p>';
          if(empty($class_name))
              echo '<p class="error">Please Select Student Class</p>';
          if(empty($rno))
              echo '<p class="error">Please Enter Student Roll No</p>';
          if(preg_match("/[a-z]/i",$rno))
              echo '<p class="error">Please Enter valid Roll No</p>';
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                  echo '<p class="error">No Numbers or Special Symbols allowed in name</p>'; 
                }
          exit();
      }
      
      $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
      $result=mysqli_query($conn,$sql);
      
      if (!$result) {
          echo '<script language="javascript">';
          echo 'alert("Unsuccessful Operation! ! Invalid Details Entered !! Please Try Again !!")';
          echo '</script>';
      }
      else{
          echo '<script language="javascript">';
          echo 'alert("Addition of Strudent Details Successful !!")';
          echo '</script>';
      }

  }
?>