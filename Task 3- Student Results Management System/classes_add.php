<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/form1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Add New Class</title>
    <style>
      legend {
    color: rgb(23, 11, 37);
    font-weight: 500;
    font-size: 1.5rem;
    border-bottom: 3px solid #6a31a0;
    width: 150px;
    margin-bottom: 30px;
}

</style>
</head>
<body>
        
<div class="title">
    <div class="heading">Add New Class</div>
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

    <div class="main" style="width: 80%; margin: 0 auto">
      <form action="" method="post" style="margin-bottom: 50px; padding: 5%">
        <legend>Add Class</legend>
        <input type="text" name="class_name" placeholder="Enter Class Name(Eg. Physics)">
        <input type="text" name="class_id" placeholder="Enter Class ID">
        <input type="submit" value="ADD CLASS DETAILS" class="submit">  
      </form>
    </div>
</body>
</html>

<?php 
	include('conn.php');
    include('session.php');

    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];

        // validation
        if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Please enter class</p>';
            if(empty($id))
                echo '<p class="error">Please enter class id</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Unsuccessful Operation !! Invalid Class Name or Class Id !! Please Try Again !!")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Addition of Class Details Successful !!")';
            echo '</script>';
        }
    }

?>