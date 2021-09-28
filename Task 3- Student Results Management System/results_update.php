<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/form1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Update Results</title>
</head>
<body>
<?php
          include('conn.php');
          include('session.php');
          ?>      
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
    
    <br><br>

    <form action="" method="post">
      <legend>Update Result</legend>
      <?php
          $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
              echo '<select name="class">';
              echo '<option selected disabled>Select Class</option>';
          while($row = mysqli_fetch_array($class_result)){
              $display=$row['name'];
              echo '<option value="'.$display.'">'.$display.'</option>';
          }
          echo'</select>'
      ?>
      
      <input type="text" name="rn" placeholder="Roll No">
      <input type="text" name="p1" id="" placeholder="CAT 1 (OUT OF 50)">
      <input type="text" name="p2" id="" placeholder="CAT 2 (OUT OF 50)">
      <input type="text" name="p3" id="" placeholder="DA 1 (OUT OF 10)">
      <input type="text" name="p4" id="" placeholder="DA 2 (OUT OF 10)">
      <input type="text" name="p5" id="" placeholder="DA 3 (OUT OF 10)">
      <input type="text" name="p6" id="" placeholder="FAT (OUT OF 100)">
      <input type="submit" value="UPDATE RESULTS">
    </form>


    <br><br>
    <form action="" method="post">
      <legend>Delete Result</legend>
     <?php
          $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
              echo '<select name="class_name">';
              echo '<option selected disabled>Select Class</option>';
          while($row = mysqli_fetch_array($class_result)){
              $display=$row['name'];
              echo '<option value="'.$display.'">'.$display.'</option>';
          }
          echo'</select>'
      ?>
      <input type="text" name="rno" placeholder="Roll No of Student">
      <input type="submit" value="DELETE RESULTS">
    </form>

    
  </div>
    
</body>
</html>

<?php


    if(isset($_POST['class_name'],$_POST['rno'])) {
        $class_name=$_POST['class_name'];
        $rno=$_POST['rno'];
        echo $class_name;
        echo $rno;
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `rno`='$rno' and `class`='$class_name'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Class Name or Student Roll No not available !! Please Try Again !!")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Details of Student Results Deleted !!")';
            echo '</script>';
        }
    }

    if(isset($_POST['rn'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['p6'],$_POST['class'])) {
        $rno=$_POST['rn'];
        $class_name=$_POST['class'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];
        $p6=(int)$_POST['p6'];
        $marks=$p1+$p2+$p3+$p4+$p5+$p6;
        $percentage=($marks/230)*100;
        

        $sql="UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`p6`='$p6',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
        $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Usuccessful Operation !! Invalid Details of Results !! Please Try Again !!")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Results Updated for Student !!")';
            echo '</script>';
        }
    }
?>