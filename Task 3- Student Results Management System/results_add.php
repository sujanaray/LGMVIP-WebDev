<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/form1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
    <title>Add Results of Student</title>
</head>
<body>
        
<div class="title">
    <div class="heading">Add Results of Student</div>
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
  <div class="main" style="width: 70%; margin: 0 auto; padding: 2% 5%">
    <form action="" method="post">
      <legend>Enter Marks of Students</legend>

        <?php
            include("conn.php");
            include("session.php");

            $select_class_query="SELECT `name` from `class`";
            $class_result=mysqli_query($conn,$select_class_query);
            //select class
            echo '<select name="class_name">';
            echo '<option selected disabled>Select Class</option>';
            
                while($row = mysqli_fetch_array($class_result)) {
                    $display=$row['name'];
                    echo '<option value="'.$display.'">'.$display.'</option>';
                }
            echo'</select>';                      
        ?>

        <input type="text" name="rno" placeholder="Roll No">
        <input type="text" name="p1" id="" placeholder="CAT 1 (OUT OF 50)">
        <input type="text" name="p2" id="" placeholder="CAT 2 (OUT OF 50)">
        <input type="text" name="p3" id="" placeholder="DA 1 (OUT OF 10)">
        <input type="text" name="p4" id="" placeholder="DA 2 (OUT OF 10)">
        <input type="text" name="p5" id="" placeholder="DA 3 (OUT OF 10)">
        <input type="text" name="p6" id="" placeholder="FAT (OUT OF 100)">
        <input type="submit" value="ADD RESULTS">
    </form>
  </div>

</body>
</html>

<?php
  if(isset($_POST['rno'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'], $_POST['p6']))
  {
    $rno=$_POST['rno'];
    if(!isset($_POST['class_name']))
        $class_name=null;
    else
        $class_name=$_POST['class_name'];
    $p1=(int)$_POST['p1'];
    $p2=(int)$_POST['p2'];
    $p3=(int)$_POST['p3'];
    $p4=(int)$_POST['p4'];
    $p5=(int)$_POST['p5'];
    $p6=(int)$_POST['p6'];
    $marks=$p1+$p2+$p3+$p4+$p5+$p6;
    $percentage=($marks/230)*100;

    // validation
    if (empty($class_name) or empty($rno) or $p1>50 or  $p2>50 or $p3>10 or $p4>10 or $p5>10  or $p6>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 or $p6<0) {
        if(empty($class_name))
            echo '<p class="error">Please Select Class</p>';
        if(empty($rno))
            echo '<p class="error">Please Enter Roll No</p>';
        if(preg_match("/[a-z]/i",$rno))
            echo '<p class="error">Please Enter Valid Roll Number</p>';
        if(preg_match("/[a-z]/i",$marks))
            echo '<p class="error">Please Enter Valid Marks</p>';
        if($p1>50 or  $p2>50 or $p3>10 or $p4>10 or $p5>10 or $p6>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 or $p6<0)
            echo '<p class="error">Please Enter Valid Marks</p>';
        exit();
    }

    $name=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rno' and `class_name`='$class_name'");
    while($row = mysqli_fetch_array($name)) {
        $display=$row['name'];
        echo $display;
      }

    $sql="INSERT INTO `result` (`name`, `rno`, `class`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `marks`, `percentage`) VALUES ('$display', '$rno', '$class_name', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$marks', '$percentage')";
    $sql=mysqli_query($conn,$sql);

    if (!$sql) {
        echo '<script language="javascript">';
        echo 'alert("Unsuccessful Operation !! Invalid Details for Results !! Please Try Again !!")';
        echo '</script>';
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Addition of Results of Students Successful !!")';
        echo '</script>';
    }
  }
?>