<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/studresult.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
    <title>Results Page</title>
</head>
<body>
<div class="title">
    <div class="heading">Results of Student</div>
    <div class="logo"> Go Back
    <a href="login.php"><i class="fas fa-sign-out-alt" style="color: rgba(59, 58, 58, 0.877); margin-left: 10px" ></i></a>
    </div>
  </div>

  

    <?php
        include("conn.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $p6 = $row['p6'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <div class="details">
            <center>
            <span>Name :</span> <?php echo $name ?> <br>
            <span>Class :</span> <?php echo $class; ?> <br>
            <span>Roll No :</span> <?php echo $rn; ?> <br>
    </center>
        </div>
        </div>
        <center><div class="main" style="width: 70%; margin: 0 auto; padding: 2% 5%">
                <?php
            echo "<table>
                <tr>
                <th width=\"50px;\">Exam</th>
              <th>CAT 1</th>
                <th>CAT 2</th>
                <th>DA 1</th>
                <th>DA 2</th>
                <th>DA 3</th>
                <th>FAT</th>
                </tr>";

            echo "<tr>";
            echo '<td>Marks</td>';
                echo '<td>'.$p1.'</td>';
                echo '<td>'.$p2.'</td>';
                echo '<td>'.$p3.'</td>';
                echo '<td>'.$p4.'</td>';
                echo '<td>'.$p5.'</td>';
                echo '<td>'.$p6.'</td>';
                echo "<tr>";
                 

            echo "</table>"; ?>

    </div>  </center>   
    <center><div class="result">
            <?php echo '<p><span>Total Marks (Out of 230) :&nbsp</span>'.$mark.'</p>';?>
            <?php echo '<p><span>Percentage :&nbsp</span>'.$percentage.'%</p>';?>
        </div><center>

        <div class="button">
            <button onclick="window.print()">Download Your Results</button>
        </div>
    </div>
   <div> <br>
    <br>
    <br></div>
</body>
</html>