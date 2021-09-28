<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/login2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
 
</head>
<body>
<div class="title">
    <div class="heading1">STUDENTS RESULTS MANAGEMENT SYSTEM</div>
    <div class="logo">Home
    <a href="index.php"><i class="fas fa-sign-out-alt" style="color: rgba(59, 58, 58, 0.877); margin-left: 10px" ></i></a>
    </div>
  </div>
  <div class="main">
    <div class="login">
      <form action="" method="post" name="login">
          <div class="heading">Admin Login</div>
          <input type="text" name="userid" placeholder="username" autocomplete="off">
          <input type="password" name="password" placeholder="password" autocomplete="off">
          <input type="submit" value="LOGIN">
      </form>    
    </div>
    <div class="search">
      <form action="./stud.php" method="get">
          <div class="heading">Student Login</div>
          <?php
            include('conn.php');

            $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                echo '<select name="class">';
                echo '<option selected disabled>Select your Class</option>';
            while($row = mysqli_fetch_array($class_result)){
                $display=$row['name'];
                echo '<option value="'.$display.'">'.$display.'</option>';
            }
            echo'</select>'
          ?>
          <input type="text" name="rn" placeholder="roll no">
          <input type="submit" value="GET YOUR RESULT">
      </form>
    </div>
          </div>
  <div class="main1 search1">
      <form action="./teacher.php" method="get">
          <div class="heading">Teacher Login</div>
          <?php
            include('conn.php');

            $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                echo '<select name="class">';
                echo '<option selected disabled>Select Class</option>';
            while($row = mysqli_fetch_array($class_result)){
                $display=$row['name'];
                echo '<option value="'.$display.'">'.$display.'</option>';
            }
            echo'</select>'
          ?>
          <input type="submit" value="VIEW RESULT">
      </form>
   <div>
     <br><br><br><br>
          </div>
          

  <!-- Footer -->
<center>
<div class="" id="footer">
  <div class="footer_data">


<div class="footer_headings">&#169; Sujana Ray </div>
</div>

  </div>
</div>
</center>
<!-- Footer ends -->
</div>
</div>
</body>
</html>

<?php
    include("conn.php");
    session_start();

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            header("Location: admin_dash.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password !! Please Try Again !!")';
            echo '</script>';
        }
        
    }
?>

